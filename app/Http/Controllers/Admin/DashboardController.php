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
        
            // Statuses for dynamic percentage calculation
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
        
            // Total price for confirmed and pending
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

    // Set date range based on filter
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
        // 'all' or no filter
        $fromDate = null;
        $toDate = null;
    }

    // Get all bookings or filtered
    $query = Booking::query();

    if ($fromDate && $toDate) {
        $query->whereBetween('created_at', [$fromDate, $toDate]);
    }

    $total = $query->count();

    // Statuses
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

        
        


    // public function dashboard()
    //     {
    //         $total_users = User::All()->count();
    //         $total_admin = User::All()->where('role','admin')->count();
    //         $total_customer = User::All()->where('role','user')->count();
    //         $total_companies = company::All()->count();
    //         return view('admin.dashboard', compact('total_users','total_admin',
    //         'total_customer','total_companies'));
    //     }
    public function bookingDashboard()
        {
            return view('admin.bookingDashboard');
        }
        
}
