<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnalyticController extends Controller
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

    // Homepage Clicks (match both with and without trailing slash)
    $homepageClicks = UserActivity::where(function ($query) {
        $query->where('url', 'like', '%://127.0.0.1:8000')
            ->orWhere('url', 'like', '%://127.0.0.1:8000/');
    })->where('method', 'click')->count();

    $uniqueHomepageClicks = UserActivity::where(function ($query) {
        $query->where('url', 'like', '%://127.0.0.1:8000')
            ->orWhere('url', 'like', '%://127.0.0.1:8000/');
    })->where('method', 'click')->distinct('ip_address')->count('ip_address');


  // Car Detail Views (e.g., /cardetail/{id})
$carDetailViews = UserActivity::where('url', 'like', url('/cardetail/%'))->count();

$uniqueCarDetailViews = UserActivity::where('url', 'like', url('/cardetail/%'))
                                    ->distinct('ip_address')
                                    ->count('ip_address');

// Car Detail Clicks (assuming clicks are logged on car detail page)
$carDetailClicks = UserActivity::where('url', 'like', url('/cardetail/%'))
                               ->where('method', 'click')
                               ->count();

$uniqueCarDetailClicks = UserActivity::where('url', 'like', url('/cardetail/%'))
                                     ->where('method', 'click')
                                     ->distinct('ip_address')
                                     ->count('ip_address');
                                  
    // Car Booking Page Views (/carbooking)
    $carBookingViews = UserActivity::where('url', 'like', '%/carbooking')->count();
    $uniqueCarBookingViews = UserActivity::where('url', 'like', '%/carbooking')
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
    // Login Page Views (/user/signin)
    $loginPageViews = UserActivity::where('url', 'like', '%/user/signin')->count();
    $uniqueLoginPageViews = UserActivity::where('url', 'like', '%/user/signin')
                                        ->distinct('ip_address')
                                        ->count('ip_address');
    // User Signup Page Views (/user/signup)
    $signupPageViews = UserActivity::where('url', 'like', '%/user/signup')->count();
    $uniqueSignupPageViews = UserActivity::where('url', 'like', '%/user/signup')
                                         ->distinct('ip_address')
                                         ->count('ip_address');                                    
     // Booking Page Views (/booking)
    $bookingPageViews = UserActivity::where('url', 'like', '%/booking')->count();
    $uniqueBookingPageViews = UserActivity::where('url', 'like', '%/booking')
                                          ->distinct('ip_address')
                                          ->count('ip_address');
    // Dashboard Views
    $dashboardViews = UserActivity::where('url', 'like', '%/dashboard')->count();
    $uniqueDashboardViews = UserActivity::where('url', 'like', '%/dashboard')
                                        ->distinct('ip_address')
                                        ->count('ip_address');
                                        
      // Contact Page
    $contactPageViews = UserActivity::where('url', 'like', '%/contact')->count();
    $uniqueContactPageViews = UserActivity::where('url', 'like', '%/contact')
                                          ->distinct('ip_address')
                                          ->count('ip_address');

    // Blog Page
    $blogPageViews = UserActivity::where('url', 'like', '%/blog')->count();
    $uniqueBlogPageViews = UserActivity::where('url', 'like', '%/blog')
                                       ->distinct('ip_address')
                                       ->count('ip_address');

    // Login Page Clicks
$loginPageClicks = UserActivity::where('url', 'like', '%/user/signin')
                               ->where('method', 'click')
                               ->count();
$uniqueLoginPageClicks = UserActivity::where('url', 'like', '%/user/signin')
                                     ->where('method', 'click')
                                     ->distinct('ip_address')
                                     ->count('ip_address');

// Signup Page Clicks
$signupPageClicks = UserActivity::where('url', 'like', '%/user/signup')
                                ->where('method', 'click')
                                ->count();
$uniqueSignupPageClicks = UserActivity::where('url', 'like', '%/user/signup')
                                      ->where('method', 'click')
                                      ->distinct('ip_address')
                                      ->count('ip_address');

// Booking Page Clicks
$bookingPageClicks = UserActivity::where('url', 'like', '%/booking')
                                 ->where('method', 'click')
                                 ->count();
$uniqueBookingPageClicks = UserActivity::where('url', 'like', '%/booking')
                                       ->where('method', 'click')
                                       ->distinct('ip_address')
                                       ->count('ip_address');

// Dashboard Clicks
$dashboardClicks = UserActivity::where('url', 'like', '%/dashboard')
                               ->where('method', 'click')
                               ->count();
$uniqueDashboardClicks = UserActivity::where('url', 'like', '%/dashboard')
                                     ->where('method', 'click')
                                     ->distinct('ip_address')
                                     ->count('ip_address');

// Contact Page Clicks
$contactPageClicks = UserActivity::where('url', 'like', '%/contact')
                                 ->where('method', 'click')
                                 ->count();
$uniqueContactPageClicks = UserActivity::where('url', 'like', '%/contact')
                                       ->where('method', 'click')
                                       ->distinct('ip_address')
                                       ->count('ip_address');

// Blog Page Clicks
$blogPageClicks = UserActivity::where('url', 'like', '%/blog')
                              ->where('method', 'click')
                              ->count();
$uniqueBlogPageClicks = UserActivity::where('url', 'like', '%/blog')
                                    ->where('method', 'click')
                                    ->distinct('ip_address')
                                    ->count('ip_address');
// terms and condition  
$termsPageViews = UserActivity::where('url', 'like', '%/terms&conditions')->count();

$uniqueTermsPageViews = UserActivity::where('url', 'like', '%/terms&conditions')
                                    ->distinct('ip_address')
                                    ->count('ip_address');

$termsPageClicks = UserActivity::where('url', 'like', '%/terms&conditions')
                                ->where('method', 'click')
                                ->count();

$uniqueTermsPageClicks = UserActivity::where('url', 'like', '%/terms&conditions')
                                     ->where('method', 'click')
                                     ->distinct('ip_address')
                                     ->count('ip_address');
// privacy policy
$privacyPolicyViews = UserActivity::where('url', 'like', '%/privacy-policy')->count();
$uniquePrivacyPolicyViews = UserActivity::where('url', 'like', '%/privacy-policy')
                                        ->distinct('ip_address')
                                        ->count('ip_address');

$privacyPolicyClicks = UserActivity::where('url', 'like', '%/privacy-policy')
                                   ->where('method', 'click')
                                   ->count();
$uniquePrivacyPolicyClicks = UserActivity::where('url', 'like', '%/privacy-policy')
                                         ->where('method', 'click')
                                         ->distinct('ip_address')
                                         ->count('ip_address');

                                   
    return view('admin.analytics', compact(
    'homepageViews', 'uniqueHomepageViews',
    'homepageClicks', 'uniqueHomepageClicks',
    'carDetailViews', 'uniqueCarDetailViews',
    'carDetailClicks','uniqueCarDetailClicks',
    'carBookingViews', 'uniqueCarBookingViews',
    'bookingClicks', 'uniqueBookingClicks',
    'loginPageViews', 'uniqueLoginPageViews',
    'loginPageClicks', 'uniqueLoginPageClicks',
    'signupPageViews', 'uniqueSignupPageViews',
    'signupPageClicks', 'uniqueSignupPageClicks',
    'bookingPageViews', 'uniqueBookingPageViews',
    'bookingPageClicks', 'uniqueBookingPageClicks',
    'dashboardViews', 'uniqueDashboardViews',
    'dashboardClicks', 'uniqueDashboardClicks',
    'contactPageViews', 'uniqueContactPageViews',
    'contactPageClicks', 'uniqueContactPageClicks',
    'blogPageViews', 'uniqueBlogPageViews',
    'blogPageClicks', 'uniqueBlogPageClicks',
     'termsPageViews', 'uniqueTermsPageViews',
    'termsPageClicks', 'uniqueTermsPageClicks',
    'privacyPolicyViews', 'uniquePrivacyPolicyViews',
    'privacyPolicyClicks', 'uniquePrivacyPolicyClicks',
));

}
}
