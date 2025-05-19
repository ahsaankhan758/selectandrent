<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserActivity;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
{
    // Homepage Views (match both with and without trailing slash)
    $homepageViews = UserActivity::where(function ($query) {
        $query->where('url', 'like', '%://127.0.0.1:8000')
              ->orWhere('url', 'like', '%://127.0.0.1:8000/');
    })->count();

    $uniqueHomepageViews = UserActivity::where(function ($query) {
        $query->where('url', 'like', '%://127.0.0.1:8000')
              ->orWhere('url', 'like', '%://127.0.0.1:8000/');
    })->distinct('ip_address')->count('ip_address');

    // Car Detail Views (e.g., /cardetail/{id})
    $carDetailViews = UserActivity::where('url', 'LIKE', url('/cardetail/%'))->count();
    $uniqueCarDetailViews = UserActivity::where('url', 'LIKE', url('/cardetail/%'))
                                        ->distinct('ip_address')
                                        ->count('ip_address');

    // Booking Clicks on /carbooking
    $bookingClicks = UserActivity::where('url', 'like', '%/carbooking')
                                 ->where('method', 'click')
                                 ->count();

    $uniqueBookingClicks = UserActivity::where('url', 'like', '%/carbooking')
                                       ->where('method', 'click')
                                       ->distinct('ip_address')
                                       ->count('ip_address');

    return view('admin.analytics', compact(
        'homepageViews', 'uniqueHomepageViews',
        'carDetailViews', 'uniqueCarDetailViews',
        'bookingClicks', 'uniqueBookingClicks'
    ));
}

}
