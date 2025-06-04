<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Booking;
use App\Models\company;
use App\Models\Country;
use App\Models\IP_Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

        public function bookingDashboard(Request $request)
        {
             $companyUserId = $request->user_id ?? null;
                $countryId = $request->country_id ?? null;
                $startDate = $request->start_date ?? null;
                $endDate = $request->end_date ?? null;

                $role = Auth::user()->role;
                $companies = Company::where('status', 1)->pluck('name', 'user_id');
                $countryNames = Country::with('companies')->where('status', 1)->get()->pluck('name','id');

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
                'confirmedCount',
                'companies', 'companyUserId',
        'countryNames' , 'countryId'
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
