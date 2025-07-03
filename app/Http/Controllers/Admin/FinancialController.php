<?php

namespace App\Http\Controllers\Admin;
use App\Models\Car;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Booking;
use App\Models\company;
use App\Models\Country;
use App\Models\IP_Address;
use App\Models\BookingItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Mail\BookingStatusMail;
use Illuminate\Support\Facades\Mail;

class FinancialController extends Controller
{
    public function earningSummary(Request $request)
{
    $companyUserId = $request->user_id ?? null;
    $countryId = $request->country_id ?? null;
    $startDate = $request->start_date ?? null;
    $endDate = $request->end_date ?? null;

    $role = Auth::user()->role;
    $companies = Company::where('status', 1)->pluck('name', 'user_id');
    $countryNames = Country::with('companies')->where('status', 1)->get()->pluck('name','id');

    if ($startDate) {
        $startDate = date('Y-m-d', strtotime($startDate));
    }
    if ($endDate) {
        $endDate = date('Y-m-d', strtotime($endDate));
    }

   $applyFilters = function ($query) use ($companyUserId, $startDate, $endDate , $countryId) {
    if ($companyUserId) {
        $query->whereHas('booking_items.vehicle', function ($q) use ($companyUserId) {
            $q->where('user_id', $companyUserId);
        });
    }

    if ($countryId) {
        $companyUserIds = Company::where('country_id', $countryId)->pluck('user_id')->toArray();

        $query->whereHas('booking_items.vehicle', function ($q) use ($companyUserIds) {
            $q->whereIn('user_id', $companyUserIds);
        });
    }

    if ($startDate && $endDate) {
        $query->whereDate('created_at', '>=', $startDate)
              ->whereDate('created_at', '<=', $endDate);
    }
    // Implement Check For Company & Employee
    $employeeOwner = EmployeeOwner(auth()->id());
    if (auth()->user()->role == 'company' || (isset($employeeOwner) && $employeeOwner->role == 'company')) {
        $userId = (auth()->user()->role == 'company') ? auth()->id() : $employeeOwner->id;
        $query->whereHas('booking_items.vehicle', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        });
    }
};


    $totalBookingsQuery = Booking::query();
    $applyFilters($totalBookingsQuery);
    $totalBookings = $totalBookingsQuery->count();

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

    $confirmedQuery = Booking::WhereIn('booking_status', ['confirmed','completed'])
                         ->Where('payment_status', 'paid');
    $pendingQuery = Booking::where('booking_status', 'pending');
    $applyFilters($confirmedQuery);
    $applyFilters($pendingQuery);

    $confirmedTotalPrice = $confirmedQuery->sum('total_price');
    // echo"<pre>";
    // print_r($confirmedTotalPrice);die;
    $pendingTotalPrice = $pendingQuery->sum('total_price');
    $confirmedCount = Booking::where('booking_status', 'confirmed')->count();
    $pendingCount = $pendingQuery->count();

    $cancelCount = Booking::where('booking_status', 'cancelled');
    $applyFilters($cancelCount);
    $cancelCount = $cancelCount->count();

    $completedCount = Booking::where('booking_status', 'completed');
    $applyFilters($completedCount);
    $completedCount = $completedCount->count();

    $bookingQuery = Booking::with('booking_items.vehicle.users');
    $applyFilters($bookingQuery);
    $bookings = $bookingQuery->orderBy('created_at', 'desc')->take(10)->get();

    if ($request->ajax()) {
        $cardsView = view('admin.financial.include.cards', compact(
            'statusData',
            'confirmedTotalPrice',
            'pendingTotalPrice',
            'confirmedCount',
            'pendingCount',
            'cancelCount',
            'completedCount'
        ))->render();

        $bookingTableView = view('admin.financial.include.dashboardBookingtable', compact('bookings'))->render();

        return response()->json([
            'cards' => $cardsView,
            'table' => $bookingTableView
        ]);
    }

    return view('admin.financial.financial', compact(
        'role', 'bookings',
        'statusData', 'totalBookings',
        'confirmedTotalPrice', 'pendingTotalPrice',
        'confirmedCount', 'pendingCount',
        'cancelCount', 'completedCount',
        'companies', 'companyUserId',
        'countryNames' , 'countryId'
    ));
}

public function markPickup($bookingItemId)
{
    $bookingItem = BookingItem::findOrFail($bookingItemId);
    $bookingItem->actual_pickup_datetime = now();
    $bookingItem->save();

    $booking = Booking::with([
        'booking_items.vehicle.carModel', 
        'booking_items.pickupLocation',
        'booking_items.dropoffLocation',
        'user', 
        'car'
    ])->findOrFail($bookingItem->booking_id);

    Mail::to($booking->email)->send(new BookingStatusMail($booking, 'Your car has been picked up successfully.'));

    $userId = auth()->id();
    $userName = auth()->user()->name ?? 'System';
    $description = $userName . ' marked a car as picked up for Booking Reference [' . $booking->booking_reference . '] successfully.';
    $action = 'Pickup';
    $module = 'Booking Item';

    activityLog($userId, $description, $action, $module);

    return back()->with('success', 'Pickup time recorded successfully.');
}

public function markDropoff($bookingItemId)
{
    $bookingItem = BookingItem::with('vehicle')->findOrFail($bookingItemId);

    $bookingItem->actual_dropoff_datetime = now();
    $bookingItem->save();

    // Update vehicle booking status and location
    if ($bookingItem->vehicle) {
        $vehicle = $bookingItem->vehicle;
        $vehicle->is_booked = '0';

        if ($bookingItem->dropoff_location) {
            $vehicle->car_location_id = $bookingItem->dropoff_location;
        }

        $vehicle->save();
    }

    // Update booking status to completed
    $booking = Booking::with([
        'booking_items.vehicle.carModel',
        'booking_items.pickupLocation',
        'booking_items.dropoffLocation',
        'user',
        'car'
    ])->findOrFail($bookingItem->booking_id);

    $booking->booking_status = 'completed';
    $booking->save();

    // Send notification email
    Mail::to($booking->email)->send(
        new BookingStatusMail($booking, 'Your car has been dropped off successfully.')
    );

    // Log activity
    $userId = auth()->id();
    $userName = auth()->user()->name ?? 'System';
    $description = $userName . ' marked a car as dropoff for Booking Reference [' . $booking->booking_reference . '] successfully.';
    $action = 'Dropoff';
    $module = 'Booking Item';

    activityLog($userId, $description, $action, $module);

    return back()->with('success', 'Dropoff time recorded and booking marked as completed.');
}


public function getOrderStatusData(Request $request)
{
    $filter = $request->filter;
    $companyUserId = $request->user_id ?? null;
    $countryId = $request->country_id ?? null;

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

    if ($countryId) {
        $companyUserIds = Company::where('country_id', $countryId)->pluck('user_id')->toArray();

        $query->whereHas('booking_items.vehicle', function ($q) use ($companyUserIds) {
            $q->whereIn('user_id', $companyUserIds);
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
    $countryId = $request->country_id ?? null;
    $startDate = $request->start_date ?? null;
    $endDate = $request->end_date ?? null;
    $now = Carbon::now();

    $labels = [];
    $data = [];

    $query = Booking::with(['booking_items.vehicle']);

    if ($companyUserId) {
        $query->whereHas('booking_items.vehicle', function ($q) use ($companyUserId) {
            $q->where('user_id', $companyUserId);
        });
    }

     if ($countryId) {
        $companyUserIds = Company::where('country_id', $countryId)->pluck('user_id')->toArray();

        $query->whereHas('booking_items.vehicle', function ($q) use ($companyUserIds) {
            $q->whereIn('user_id', $companyUserIds);
        });
    }

    if ($startDate && $endDate) {
        $start = Carbon::parse($startDate)->startOfDay();
        $end = Carbon::parse($endDate)->endOfDay();

        $query->whereBetween('created_at', [$start, $end]);

        $bookings = $query->get()->groupBy(function ($booking) {
            return Carbon::parse($booking->created_at)->format('Y-m-d');
        });

        $period = \Carbon\CarbonPeriod::create($startDate, $endDate);
        foreach ($period as $date) {
            $dateKey = $date->format('Y-m-d');
            $labels[] = $date->format('d M Y');
            $data[] = isset($bookings[$dateKey]) ? $bookings[$dateKey]->count() : 0;
        }

    } else {
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
    $companyUserId = $request->query('user_id');
    $countryId = $request->country_id ?? null;
    $startDateInput = $request->query('start_date');
    $endDateInput = $request->query('end_date');
    $months = $request->query('months', 12);
    $now = Carbon::now();

    $startDate = $startDateInput ? Carbon::parse($startDateInput)->startOfDay() : $now->copy()->subMonths($months - 1)->startOfMonth();
    $endDate = $endDateInput ? Carbon::parse($endDateInput)->endOfDay() : $now->endOfDay();

    $query = Booking::with(['booking_items.vehicle'])
        ->where('booking_status', 'confirmed')
        ->whereBetween('created_at', [$startDate, $endDate]);

    if ($companyUserId) {
        $query->whereHas('booking_items.vehicle', function ($q) use ($companyUserId) {
            $q->where('user_id', $companyUserId);
        });
    }

     if ($countryId) {
        $companyUserIds = Company::where('country_id', $countryId)->pluck('user_id')->toArray();

        $query->whereHas('booking_items.vehicle', function ($q) use ($companyUserIds) {
            $q->whereIn('user_id', $companyUserIds);
        });
    }

    $bookings = $query->get();

    $earnings = $bookings->groupBy(function ($booking) {
        return Carbon::parse($booking->created_at)->format('M Y');
    })->map(function ($group) {
        return $group->sum('total_price');
    });

    $labels = [];
    $data = [];

    $period = Carbon::parse($startDate)->startOfMonth();
    $end = Carbon::parse($endDate)->endOfMonth();

    while ($period <= $end) {
        $label = $period->format('M Y');
        $labels[] = $label;
        $data[] = $earnings[$label] ?? 0;
        $period->addMonth();
    }

    return response()->json([
        'labels' => $labels,
        'data' => $data,
    ]);
}

public function invoice($id)
{
    $booking = Booking::with([ 'booking_items.vehicle.carModel', 
        'booking_items.pickupLocation',
        'booking_items.dropoffLocation',
        'user', 
        'car'])->findOrFail($id);
    return view('admin.financial.include.invoice', compact('booking'));
}
}
