<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Booking;
use App\Models\company;
use App\Models\IP_Address;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index()
        {
            return redirect('admin/login');
        }

        // public function dashboard()
        // {
        //     $role = Auth::user()->role;
        //     $bookings = Booking::with('user')->paginate(10);
        //     $confirmedtotalprice = Booking::where('booking_status', 'confirmed')->sum('total_price');
        //     $confirmedCount = Booking::where('booking_status', 'confirmed')->count();
        //     $pendingCount = Booking::where('booking_status', 'pending')->count();
        //     $pendingtotalprice = Booking::where('booking_status', 'pending')->sum('total_price');
        //     return view('admin.dashboard', compact('role', 'bookings', 'confirmedtotalprice','pendingtotalprice', 'confirmedCount', 'pendingCount'));
        // }
        public function dashboard()
        {
            $role = Auth::user()->role;
            $bookings = Booking::with('user')->paginate(10);
        
            $statuses = ['confirmed', 'pending', 'cancelled', 'completed'];
            $statusData = [];
            $totalBookings = Booking::count();
        
            foreach ($statuses as $status) {
                $count = Booking::where('booking_status', $status)->count();
                $percentage = $totalBookings > 0 ? round(($count / $totalBookings) * 100) : 0;
        
                $statusData[$status] = [
                    'count' => $count,
                    'percentage' => $percentage,
                ];
            }
        
            $confirmedtotalprice = Booking::where('booking_status', 'confirmed')->sum('total_price');
            $pendingtotalprice = Booking::where('booking_status', 'pending')->sum('total_price');
            $confirmedCount = Booking::where('booking_status', 'confirmed')->count();
            $pendingCount = Booking::where('booking_status', 'pending')->count();
            $cancelCount = Booking::where('booking_status', 'cancelled')->count();
            $completedCount = Booking::where('booking_status', 'completed')->count();
        
            return view('admin.dashboard', compact(
                'role', 'bookings', 
                'statusData', 'totalBookings', 
                'confirmedtotalprice', 'pendingtotalprice', 
                'confirmedCount', 'pendingCount','cancelCount','completedCount'
            ));
        }
        
     
        
        // public function getOrderStatusData(Request $request)
        // {
        //     $filter = $request->get('filter');
        
        //     // Set date range based on filter
        //     if ($filter === 'week') {
        //         $fromDate = Carbon::now()->subDays(7)->startOfDay();
        //     } elseif ($filter === 'month') {
        //         $fromDate = Carbon::now()->startOfMonth();
        //     } elseif ($filter === 'year') {
        //         $fromDate = Carbon::now()->startOfYear();
        //     } else {
        //         // Default: last 7 days
        //         $fromDate = Carbon::now()->subDays(7)->startOfDay();
        //     }
        
        //     // Fetch orders created after the fromDate
        //     $orders = Booking::where('created_at', '>=', $fromDate)->get();
        
        //     $total = $orders->count();
        
        //     $statusData = [
        //         'confirmed' => ['percentage' => $total ? round(($orders->where('booking_status', 'confirmed')->count() / $total) * 100, 2) : 0],
        //         'pending' => ['percentage' => $total ? round(($orders->where('booking_status', 'pending')->count() / $total) * 100, 2) : 0],
        //         'cancelled' => ['percentage' => $total ? round(($orders->where('booking_status', 'cancelled')->count() / $total) * 100, 2) : 0],
        //         'completed' => ['percentage' => $total ? round(($orders->where('booking_status', 'completed')->count() / $total) * 100, 2) : 0],
        //     ];
        
        //     return response()->json($statusData);
        // }


        public function getOrderStatusData(Request $request)
        {
            $filter = $request->filter;

            if ($filter === 'today') {
                $fromDate = Carbon::today();
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
            
            $query = Booking::query();

            if ($fromDate && $toDate) {
                $query->whereBetween('created_at', [$fromDate, $toDate]);
            }

            $total = $query->count();
            $statuses = ['confirmed', 'pending', 'cancelled', 'completed'];
            $data = [];

            foreach ($statuses as $status) {
                $count = (clone $query)->where('booking_status', $status)->count();
                $percentage = $total > 0 ? round(($count / $total) * 100) : 0;

                $data[$status] = [
                    'percentage' => $percentage
                ];
            }

            return response()->json($data);
        }

        public function getChartData(Request $request)
        {
            $type = $request->query('type'); 

            $now = Carbon::now();
            $labels = [];
            $data = [];

            if ($type === 'month') {
                $bookings = DB::table('bookings')
                    ->whereMonth('created_at', $now->month)
                    ->whereYear('created_at', $now->year)
                    ->selectRaw('DAY(created_at) as day, COUNT(*) as total')
                    ->groupBy('day')
                    ->orderBy('day')
                    ->pluck('total', 'day');

                foreach (range(1, $now->daysInMonth) as $day) {
                    $labels[] = "{$day} {$now->format('F')}";
                    $data[] = $bookings[$day] ?? 0;
                }

            } elseif ($type === 'last_month') {
                $lastMonth = $now->copy()->subMonth();

                $bookings = DB::table('bookings')
                    ->whereMonth('created_at', $lastMonth->month)
                    ->whereYear('created_at', $lastMonth->year)
                    ->selectRaw('DAY(created_at) as day, COUNT(*) as total')
                    ->groupBy('day')
                    ->orderBy('day')
                    ->pluck('total', 'day');

                foreach (range(1, $lastMonth->daysInMonth) as $day) {
                    $labels[] = "{$day} {$lastMonth->format('F')}";
                    $data[] = $bookings[$day] ?? 0;
                }

            } elseif ($type === 'this_year') {
                $bookings = DB::table('bookings')
                    ->whereYear('created_at', $now->year)
                    ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                    ->groupBy('month')
                    ->orderBy('month')
                    ->pluck('total', 'month');

                $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                for ($i = 1; $i <= 12; $i++) {
                    $data[] = $bookings[$i] ?? 0;
                }
            }

            return response()->json([
                'labels' => $labels,
                'data' => $data
            ]);
        }

        public function getEarningsData(Request $request)
        {
            $months = $request->query('months', 12);
    
            $now = Carbon::now();
            $startDate = $now->copy()->subMonths($months - 1)->startOfMonth();
    
            $earnings = Booking::where('booking_status', 'confirmed')
                ->where('created_at', '>=', $startDate)
                ->get()
                ->groupBy(function ($booking) {
                    return Carbon::parse($booking->created_at)->format('M');
                })
                ->map(function ($monthBookings) {
                    return $monthBookings->sum('total_price');
                });
    
            // Ensure all months are present with 0 if missing
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
        
        public function bookingDashboard()
        {
            $bookings = Booking::with('user')->paginate(10);
            $today = Carbon::today();
        
            $futureConfirmedCount = Booking::where('booking_status', 'confirmed')
                ->whereDate('created_at', '>', $today)
                ->count();
        
            $pendingCount = Booking::where('booking_status', 'pending')->count();
        
            $cancelledCount = Booking::where('booking_status', 'cancelled')->count();
        
            $confirmedCount = Booking::where('booking_status', 'confirmed')->count();
        
            return view('admin.bookingDashboard', compact(
                'futureConfirmedCount',
                'bookings',
                'pendingCount',
                'cancelledCount',
                'confirmedCount'
            ));
        }
        
        public function BookingsOverview(Request $request)
        {
            $months = $request->query('months', 12);
            $data = [];
        
            for ($i = 0; $i < $months; $i++) {
                $monthDate = Carbon::now()->subMonths($months - 1 - $i);
                $month = $monthDate->format('M');
                $year = $monthDate->year;
        
                $confirmed = Booking::where('booking_status', 'confirmed')
                    ->whereMonth('created_at', $monthDate->month)
                    ->whereYear('created_at', $year)
                    ->count();
        
                $cancelled = Booking::where('booking_status', 'cancelled')
                    ->whereMonth('created_at', $monthDate->month)
                    ->whereYear('created_at', $year)
                    ->count();
        
                $data[] = [
                    'month' => $month,
                    'confirmed' => $confirmed,
                    'cancelled' => $cancelled,
                ];
            }
        
            return response()->json($data);
        }
        
}
