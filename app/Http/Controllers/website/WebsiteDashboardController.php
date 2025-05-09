<?php

namespace App\Http\Controllers\website;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteDashboardController extends Controller
{
    // public function index()
    // {
    //     return view('website.dashboard');
    // }
    // public function index()
    // {
    //     $user = Auth::user();
    //     echo"<pre>";
    //     print_r($user);die;
    //     return view('website.dashboard', compact('user'));
    // }
public function index()
{
    $user = Auth::user()->load('bookings');

    $statusCounts = [
        'complete'   => $user->bookings->where('booking_status', 'complete')->count(),
        'pending'    => $user->bookings->where('booking_status', 'pending')->count(),
        'confirmed'  => $user->bookings->where('booking_status', 'confirmed')->count(),
        'cancelled'  => $user->bookings->where('booking_status', 'cancelled')->count(),
    ];

    return view('website.dashboard', compact('user', 'statusCounts'));
}



}
