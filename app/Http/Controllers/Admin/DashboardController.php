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

        public function dashboard()
        {
            return view('admin.dashboard');
        }

        public function bookingDashboard()
        {
            $bookings = Booking::with('user')->orderBy('created_at', 'desc')->take(10)->get();
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
