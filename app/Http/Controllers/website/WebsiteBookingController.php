<?php

namespace App\Http\Controllers\website;

use App\Models\Booking;
use App\Models\BookingDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::paginate(10); 
        return view('website.booking', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::with(['booking_items', 'user'])->findOrFail($id);
        return view('website.bookingdetail', compact('booking'));
    }
    
    
    

    
}
