<?php

namespace App\Http\Controllers\website;

use App\Models\Booking;
use App\Models\BookingDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WebsiteBookingController extends Controller
{


    public function index()
    {
        $userId = Auth::id();
        $bookings = Booking::with('user')->where('user_id', $userId)->paginate(10); 
        return view('website.booking', compact('bookings'));
    }

    public function show($id)
{
    $booking = Booking::with([
        'booking_items.vehicle.carModel',
        'booking_items.pickupLocation',
        'booking_items.dropoffLocation',
        'booking_items.vehicle.user.company',
        'user',
        'car'
    ])->findOrFail($id);

    return view('website.bookingdetail', compact('booking'));
}
    
}
