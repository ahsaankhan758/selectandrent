<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use App\Models\Booking;
use App\Models\company;
use App\Models\Country;
use App\Models\Language;
use App\Models\Reminder;
use App\Models\IP_Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\FilterHelper;

class DashboardController extends Controller
{
    public function index()
        {
            return redirect('admin/login');
        }
    // Earning Dashboard
    public function dashboard()
    {
    $totalCars = Car::where(FilterHelper::carFilter())->count();
    $totalbooking = Booking::where(FilterHelper::companyFilter())->count();
    $bookedCars = Car::where('is_booked', 1)->where(FilterHelper::carFilter())->count();
    $totalrevenue = Booking::where('payment_status', 'paid')->where(FilterHelper::companyFilter())->sum('total_price');
    $totalpending = Booking::where('payment_status', 'pending')->where(FilterHelper::companyFilter())->sum('total_price');
    $commission = Booking::where(FilterHelper::companyFilter())->sum('commission');
    $payoutcompany = $totalrevenue - $commission;
    $customers = User::whereHas('bookings', FilterHelper::companyFilter())->count();
    $totalcancelled = Booking::where('payment_status', 'failed')->whereDate('created_at', Carbon::today())->where(FilterHelper::companyFilter())->count();
    $reminder = Reminder::where('user_id', auth()->id())->latest()->take(10)->get();

    return view('admin.dashboard', compact(
        'reminder', 'totalCars', 'payoutcompany', 'customers',
        'bookedCars', 'commission', 'totalrevenue', 'totalbooking', 'totalcancelled', 'totalpending'
    ));
    }
        // Booking dashboard
        public function bookingDashboard(Request $request)
        {
            $companyUserId = $request->user_id ?? null;
            $countryId = $request->country_id ?? null;
            $startDate = $request->start_date ? date('Y-m-d', strtotime($request->start_date)) : null;
            $endDate = $request->end_date ? date('Y-m-d', strtotime($request->end_date)) : null;

            $role = Auth::user()->role;
            $companies = Company::where('status', 1)->pluck('name', 'user_id');
            $countryNames = Country::with('companies')->where('status', 1)->get()->pluck('name','id');

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
                
                $employeeOwner = EmployeeOwner(auth()->id());
                if (auth()->user()->role == 'company' || (isset($employeeOwner) && $employeeOwner->role == 'company')) {
                    $userId = (auth()->user()->role == 'company') ? auth()->id() : $employeeOwner->id;
                    $query->whereHas('booking_items.vehicle', function ($q) use ($userId) {
                        $q->where('user_id', $userId);
                    });
                }
            };

            $bookingQuery = Booking::with('user')->orderBy('created_at', 'desc')->take(10);
            $applyFilters($bookingQuery);
            $bookings = $bookingQuery->get();

            $today = Carbon::today();

            $futureConfirmedQuery = Booking::where('booking_status', 'confirmed')
                ->whereDate('created_at', '>', $today);
            $applyFilters($futureConfirmedQuery);
            $futureConfirmedCount = $futureConfirmedQuery->count();

            $pendingQuery = Booking::where('booking_status', 'pending');
            $applyFilters($pendingQuery);
            $pendingCount = $pendingQuery->count();

            $cancelledQuery = Booking::where('booking_status', 'cancelled');
            $applyFilters($cancelledQuery);
            $cancelledCount = $cancelledQuery->count();

            $confirmedQuery = Booking::where('booking_status', 'completed');
            $applyFilters($confirmedQuery);
            $confirmedCount = $confirmedQuery->count();

            if ($request->ajax()) {
                $cardsView = view('admin.bookingDashboard.include.cards', compact(
                    'futureConfirmedCount',
                    'pendingCount',
                    'cancelledCount',
                    'confirmedCount'
                ))->render();

                $tableView = view('admin.financial.include.dashboardBookingtable', compact('bookings'))->render();

                return response()->json([
                    'cards' => $cardsView,
                    'table' => $tableView
                ]);
            }

            return view('admin.bookingDashboard.bookingDashboard', compact(
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
            $companyUserId = $request->query('user_id');
            $countryId = $request->query('country_id');
            $startDate = $request->query('start_date') ? date('Y-m-d', strtotime($request->query('start_date'))) : null;
            $endDate = $request->query('end_date') ? date('Y-m-d', strtotime($request->query('end_date'))) : null;

            $applyFilters = function ($query) use ($companyUserId, $startDate, $endDate, $countryId) {
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
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                }
            };

            $data = [];

            for ($i = 0; $i < $months; $i++) {
                $monthDate = Carbon::now()->subMonths($months - 1 - $i);
                $month = $monthDate->format('M');
                $year = $monthDate->year;

                $confirmedQuery = Booking::where('booking_status', 'confirmed')
                    ->whereMonth('created_at', $monthDate->month)
                    ->whereYear('created_at', $year);
                $applyFilters($confirmedQuery);
                $confirmed = $confirmedQuery->count();

                $cancelledQuery = Booking::where('booking_status', 'cancelled')
                    ->whereMonth('created_at', $monthDate->month)
                    ->whereYear('created_at', $year);
                $applyFilters($cancelledQuery);
                $cancelled = $cancelledQuery->count();

                $data[] = [
                    'month' => $month,
                    'confirmed' => $confirmed,
                    'cancelled' => $cancelled,
                ];
            }

            return response()->json($data);
        }
}







        // public function bookingDashboard(Request $request)
        // {
        //     $companyUserId = $request->user_id ?? null;
        //     $countryId = $request->country_id ?? null;
        //     $startDate = $request->start_date ?? null;
        //     $endDate = $request->end_date ?? null;

        //     $role = Auth::user()->role;
        //     $companies = Company::where('status', 1)->pluck('name', 'user_id');
        //     $countryNames = Country::with('companies')->where('status', 1)->get()->pluck('name','id');

        //     if ($startDate) {
        //         $startDate = date('Y-m-d', strtotime($startDate));
        //     }
        //     if ($endDate) {
        //         $endDate = date('Y-m-d', strtotime($endDate));
        //     }

        //     $applyFilters = function ($query) use ($companyUserId, $startDate, $endDate , $countryId) {
        //     if ($companyUserId) {
        //         $query->whereHas('booking_items.vehicle', function ($q) use ($companyUserId) {
        //             $q->where('user_id', $companyUserId);
        //         });
        //     }

        //     if ($countryId) {
        //         $companyUserIds = Company::where('country_id', $countryId)->pluck('user_id')->toArray();

        //         $query->whereHas('booking_items.vehicle', function ($q) use ($companyUserIds) {
        //             $q->whereIn('user_id', $companyUserIds);
        //         });
        //     }

        //     if ($startDate && $endDate) {
        //         $query->whereDate('created_at', '>=', $startDate)
        //                 ->whereDate('created_at', '<=', $endDate);
        //     }
        //     };


        //     $bookings = Booking::with('user')->orderBy('created_at', 'desc')->take(10)->get();
        //     $today = Carbon::today();
        
        //     $futureConfirmedCount = Booking::where('booking_status', 'confirmed')
        //         ->whereDate('created_at', '>', $today)
        //         ->count();
        
        //     $pendingCount = Booking::where('booking_status', 'pending')->count();
        //     $cancelledCount = Booking::where('booking_status', 'cancelled')->count();
        //     $confirmedCount = Booking::where('booking_status', 'confirmed')->count();
        
        //     return view('admin.bookingDashboard', compact(
        //         'futureConfirmedCount',
        //         'bookings',
        //         'pendingCount',
        //         'cancelledCount',
        //         'confirmedCount',
        //         'companies', 'companyUserId',
        //         'countryNames' , 'countryId'
        //     ));
        // }

    //          public function BookingsOverview(Request $request)
    //     {
    //         $months = $request->query('months', 12);
    //         $data = [];
        
    //         for ($i = 0; $i < $months; $i++) {
    //             $monthDate = Carbon::now()->subMonths($months - 1 - $i);
    //             $month = $monthDate->format('M');
    //             $year = $monthDate->year;
        
    //             $confirmed = Booking::where('booking_status', 'confirmed')
    //                 ->whereMonth('created_at', $monthDate->month)
    //                 ->whereYear('created_at', $year)
    //                 ->count();
        
    //             $cancelled = Booking::where('booking_status', 'cancelled')
    //                 ->whereMonth('created_at', $monthDate->month)
    //                 ->whereYear('created_at', $year)
    //                 ->count();
        
    //             $data[] = [
    //                 'month' => $month,
    //                 'confirmed' => $confirmed,
    //                 'cancelled' => $cancelled,
    //             ];
    //         }
    //         return response()->json($data);
    // }
