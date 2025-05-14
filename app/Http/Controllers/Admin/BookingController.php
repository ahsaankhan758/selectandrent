<?php

namespace App\Http\Controllers\Admin;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class BookingController extends Controller
{
    public function index()
    {

        $query = Booking::orderBy('created_at', 'desc');
    
        if (Auth::user()->role === 'company') {
            $query->where('user_id', Auth::id());
        }
    
        $bookings = $query->with('user')->paginate(10);
    
        return(view('admin.carBooking.carBooking', compact('bookings')));
        
        // $bookings = Booking::with('user')->paginate(10);
        // return(view('admin.carBooking.carBooking', compact('bookings')));
    }

    public function carBookingDetail($id)
    {
        $booking = Booking::with(['booking_items.vehicle.carModel', 'user','car'])->findOrFail($id);
        return view('admin.carBooking.carBookingDetail', compact('booking'));
    }

}
