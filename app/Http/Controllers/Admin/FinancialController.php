<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Booking;
use App\Models\company;
use App\Models\IP_Address;
use App\Models\BookingItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FinancialController extends Controller
{
public function earningSummary(Request $request)
{
    $companyUserId = $request->user_id ?? null;
    $startDate = $request->start_date ?? null;
    $endDate = $request->end_date ?? null;

    $role = Auth::user()->role;
    $companies = Company::where('status', 1)->pluck('name', 'user_id');

    // Convert dates to proper Y-m-d format if provided
    if ($startDate) {
        $startDate = date('Y-m-d', strtotime($startDate));
    }
    if ($endDate) {
        $endDate = date('Y-m-d', strtotime($endDate));
    }

    // Helper function to apply company and date filters
    $applyFilters = function ($query) use ($companyUserId, $startDate, $endDate) {
        if ($companyUserId) {
            $query->whereHas('booking_items.vehicle', function ($q) use ($companyUserId) {
                $q->where('user_id', $companyUserId);
            });
        }
        if ($startDate && $endDate) {
            // Filter by date only (ignore time)
            $query->whereDate('created_at', '>=', $startDate)
                  ->whereDate('created_at', '<=', $endDate);
        }
    };

    // Total bookings query
    $totalBookingsQuery = Booking::query();
    $applyFilters($totalBookingsQuery);
    $totalBookings = $totalBookingsQuery->count();

    // Booking status counts and percentages
    $statuses = ['confirmed', 'pending', 'cancelled', 'completed'];
    $statusData = [];
    foreach ($statuses as $status) {
        $query = Booking::where('booking_status', $status);
        $applyFilters($query);
        $count = $query->count();
        $percentage = $totalBookings > 0 ? round(($count / $totalBookings) * 100) : 0;

        $statusData[$status] = [
            'count' => $count,
            'percentage' => $percentage,
        ];
    }

    // Confirmed and Pending total prices and counts
    $confirmedQuery = Booking::where('booking_status', 'confirmed');
    $pendingQuery = Booking::where('booking_status', 'pending');
    $applyFilters($confirmedQuery);
    $applyFilters($pendingQuery);

    $confirmedTotalPrice = $confirmedQuery->sum('total_price');
    $pendingTotalPrice = $pendingQuery->sum('total_price');
    $confirmedCount = $confirmedQuery->count();
    $pendingCount = $pendingQuery->count();

    $cancelCount = Booking::where('booking_status', 'cancelled');
    $applyFilters($cancelCount);
    $cancelCount = $cancelCount->count();

    $completedCount = Booking::where('booking_status', 'completed');
    $applyFilters($completedCount);
    $completedCount = $completedCount->count();

    if ($request->ajax()) {
        return view('admin.financial.include.cards', compact(
            'statusData',
            'confirmedTotalPrice',
            'pendingTotalPrice',
            'confirmedCount',
            'pendingCount',
            'cancelCount',
            'completedCount'
        ));
    }

    // For normal full page load
    $bookingQuery = Booking::with('booking_items.vehicle.users');
    $applyFilters($bookingQuery);
    $bookings = $bookingQuery->orderBy('created_at', 'desc')->take(10)->get();

    return view('admin.financial.financial', compact(
        'role', 'bookings',
        'statusData', 'totalBookings',
        'confirmedTotalPrice', 'pendingTotalPrice',
        'confirmedCount', 'pendingCount',
        'cancelCount', 'completedCount',
        'companies', 'companyUserId'
    ));
}

public function getOrderStatusData(Request $request)
{
    $filter = $request->filter;
    $companyUserId = $request->user_id;

    $startDate = $request->start_date ?? null;
    $endDate = $request->end_date ?? null;

    if ($startDate && $endDate) {
        $fromDate = Carbon::parse($startDate)->startOfDay();
        $toDate = Carbon::parse($endDate)->endOfDay();
    } else {
        if ($filter === 'today') {
            $fromDate = Carbon::today()->startOfDay();
            $toDate = Carbon::today()->endOfDay();
        } elseif ($filter === 'week') {
            $fromDate = Carbon::now()->startOfWeek();
            $toDate = Carbon::now()->endOfWeek();
        } elseif ($filter === 'month') {
            $fromDate = Carbon::now()->startOfMonth();
            $toDate = Carbon::now()->endOfMonth();
        } elseif ($filter === 'last_month') {
            $fromDate = Carbon::now()->subMonth()->startOfMonth();
            $toDate = Carbon::now()->subMonth()->endOfMonth();
        } else {
            $fromDate = null;
            $toDate = null;
        }
    }
    $query = Booking::query();
    if ($companyUserId) {
        $query->whereHas('booking_items.vehicle', function ($q) use ($companyUserId) {
            $q->where('user_id', $companyUserId);
        });
    }

    if ($fromDate && $toDate) {
        $query->whereDate('created_at', '>=', $fromDate->format('Y-m-d'))
              ->whereDate('created_at', '<=', $toDate->format('Y-m-d'));
    }

    $total = $query->count();
    $statuses = ['confirmed', 'pending', 'cancelled', 'completed'];
    $data = [];

    foreach ($statuses as $status) {
        $count = (clone $query)->where('booking_status', $status)->count();
        $percentage = $total > 0 ? round(($count / $total) * 100) : 0;

        $data[$status] = ['percentage' => $percentage];
    }

    return response()->json($data);
}

// booking chart

public function getChartData(Request $request)
{
    $type = $request->query('type');
    $companyUserId = $request->user_id ?? null;
    $startDate = $request->start_date ?? null;
    $endDate = $request->end_date ?? null;
    $now = Carbon::now();

    $labels = [];
    $data = [];

    $query = Booking::with(['booking_items.vehicle']);

    // Filter by user_id if provided
    if ($companyUserId) {
        $query->whereHas('booking_items.vehicle', function ($q) use ($companyUserId) {
            $q->where('user_id', $companyUserId);
        });
    }

    // Filter by date range if both dates are provided
    if ($startDate && $endDate) {
        $start = Carbon::parse($startDate)->startOfDay();
        $end = Carbon::parse($endDate)->endOfDay();

        $query->whereBetween('created_at', [$start, $end]);

        $bookings = $query->get()->groupBy(function ($booking) {
            return Carbon::parse($booking->created_at)->format('Y-m-d');
        });

        // Create labels and data for each day in the period
        $period = \Carbon\CarbonPeriod::create($startDate, $endDate);
        foreach ($period as $date) {
            $dateKey = $date->format('Y-m-d');
            $labels[] = $date->format('d M Y');
            $data[] = isset($bookings[$dateKey]) ? $bookings[$dateKey]->count() : 0;
        }

    } else {
        // Otherwise, fallback on type-based filtering

        switch ($type) {
            case 'month':
                $query->whereMonth('created_at', $now->month)
                      ->whereYear('created_at', $now->year);

                $bookings = $query->get()->groupBy(function ($booking) {
                    return Carbon::parse($booking->created_at)->day;
                });

                for ($day = 1; $day <= $now->daysInMonth; $day++) {
                    $labels[] = "{$day} {$now->format('F')}";
                    $data[] = isset($bookings[$day]) ? $bookings[$day]->count() : 0;
                }
                break;

            case 'last_month':
                $lastMonth = $now->copy()->subMonth();

                $query->whereMonth('created_at', $lastMonth->month)
                      ->whereYear('created_at', $lastMonth->year);

                $bookings = $query->get()->groupBy(function ($booking) {
                    return Carbon::parse($booking->created_at)->day;
                });

                for ($day = 1; $day <= $lastMonth->daysInMonth; $day++) {
                    $labels[] = "{$day} {$lastMonth->format('F')}";
                    $data[] = isset($bookings[$day]) ? $bookings[$day]->count() : 0;
                }
                break;

            case 'this_year':
            default:
                $query->whereYear('created_at', $now->year);

                $bookings = $query->get()->groupBy(function ($booking) {
                    return Carbon::parse($booking->created_at)->month;
                });

                $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                for ($month = 1; $month <= 12; $month++) {
                    $data[] = isset($bookings[$month]) ? $bookings[$month]->count() : 0;
                }
                break;
        }
    }

    return response()->json([
        'labels' => $labels,
        'data' => $data,
    ]);
}

// earning summary

public function getEarningsData(Request $request)
{
    $companyUserId = $request->user_id ?? null; 
    $months = $request->query('months', 12);

    $now = Carbon::now();
    $startDate = $now->copy()->subMonths($months - 1)->startOfMonth();

    // Query base
    $query = Booking::where('booking_status', 'confirmed')
        ->where('created_at', '>=', $startDate);

    // If companyUserId is given, filter using relation
    if ($companyUserId) {
        $query->whereHas('booking_items.vehicle', function ($q) use ($companyUserId) {
            $q->where('user_id', $companyUserId);
        });
    }

    // Fetch and group by month
    $earnings = $query->get()
        ->groupBy(function ($booking) {
            return Carbon::parse($booking->created_at)->format('M');
        })
        ->map(function ($monthBookings) {
            return $monthBookings->sum('total_price');
        });

    // Build response
    $labels = [];
    $data = [];

    for ($i = 0; $i < $months; $i++) {
        $monthName = $now->copy()->subMonths($months - 1 - $i)->format('M');
        $labels[] = $monthName;
        $data[] = $earnings[$monthName] ?? 0;
    }

    return response()->json([
        'labels' => $labels,
        'data' => $data
    ]);
}

        // public function getEarningsData(Request $request)
        // {
        //     $companyUserId = $request->user_id ?? null;
        //     $months = $request->query('months', 12);
    
        //     $now = Carbon::now();
        //     $startDate = $now->copy()->subMonths($months - 1)->startOfMonth();
    
        //     $earnings = Booking::where('booking_status', 'confirmed')
        //         ->where('created_at', '>=', $startDate)
        //         ->get()
        //         ->groupBy(function ($booking) {
        //             return Carbon::parse($booking->created_at)->format('M');
        //         })
        //         ->map(function ($monthBookings) {
        //             return $monthBookings->sum('total_price');
        //         });
    
        //     $labels = [];
        //     $data = [];
        //     for ($i = 0; $i < $months; $i++) {
        //         $monthName = $now->copy()->subMonths($months - 1 - $i)->format('M');
        //         $labels[] = $monthName;
        //         $data[] = $earnings[$monthName] ?? 0;
        //     }
    
        //     return response()->json([
        //         'labels' => $labels,
        //         'data' => $data
        //     ]);
        // }
}
