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
}
