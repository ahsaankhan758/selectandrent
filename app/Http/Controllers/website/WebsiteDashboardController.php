<?php

namespace App\Http\Controllers\website;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteDashboardController extends Controller
{
public function index()
{
    $user = Auth::user()->load('bookings');

    $confirmedTotal = $user->bookings->where('booking_status', 'confirmed')->sum('total_price');
    $pendingTotal   = $user->bookings->where('booking_status', 'pending')->sum('total_price');
    $cancelledTotal = $user->bookings->where('booking_status', 'cancelled')->sum('total_price');

    $statusCounts = [
        // 'complete'   => $user->bookings->where('booking_status', 'complete')->count(),
        'pending'    => $user->bookings->where('booking_status', 'pending')->count(),
        'confirmed'  => $user->bookings->where('booking_status', 'confirmed')->count(),
        'cancelled'  => $user->bookings->where('booking_status', 'cancelled')->count(),
    ];

    $priceTotals = [
        'confirmed' => $confirmedTotal,
        'pending'   => $pendingTotal,
        'cancelled' => $cancelledTotal,
    ];

    return view('website.dashboard', compact('user', 'statusCounts', 'priceTotals'));
}




}
