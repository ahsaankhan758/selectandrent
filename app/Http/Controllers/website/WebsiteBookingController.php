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
        $bookings = Booking::with('booking_items.vehicle.company','user')->where('user_id', $userId)->paginate(10); 
        // echo"<pre>";
        // print_r($bookings);die;
        return view('website.booking', compact('bookings'));
    }

    public function show($id)
    {

        $booking = Booking::with([
            'booking_items.vehicle.carModel',
            'booking_items.vehicle.company', 
            'booking_items.pickupLocation',
            'booking_items.dropoffLocation',
            'user',
            'car'
        ])->findOrFail($id);

        return view('website.bookingdetail', compact('booking'));
    }
    
}
