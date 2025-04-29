<?php

namespace App\Http\Controllers\Admin;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('user')->paginate(10);
        return(view('admin.carBooking.carBooking', compact('bookings')));
    }

    public function carBookingDetail($id)
    {
        $booking = Booking::with(['booking_items.vehicle.carModel', 'user','car'])->findOrFail($id);
        return view('admin.carBooking.carBookingDetail', compact('booking'));
    }

}
