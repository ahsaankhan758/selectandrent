<?php

namespace App\Http\Controllers\Admin;
use App\Models\Booking;
use App\Models\BookingItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class BookingController extends Controller
{
    public function index()
    {
        $query = Booking::with(['booking_items.vehicle.carModel', 'user', 'car']);

        if (Auth::user()->role === 'company') {
            $query->whereHas('booking_items.vehicle', function ($q) {
                $q->where('user_id', Auth::id());
            });
        }

        $bookings = $query->paginate(10);

        return view('admin.carBooking.carBooking', compact('bookings'));
    }

    // public function carBookingDetail($id)
    // {
    //     $booking = Booking::with(['booking_items.vehicle.carModel', 'user','car'])->findOrFail($id);
    //     return view('admin.carBooking.carBookingDetail', compact('booking'));
    // }
public function carBookingDetail($id)
{
    $booking = Booking::with([
        'booking_items.vehicle.carModel', 
        'booking_items.pickupLocation',
        'booking_items.dropoffLocation',
        'user', 
        'car'
    ])->findOrFail($id);

    return view('admin.carBooking.carBookingDetail', compact('booking'));
}



//     public function carBookingDetail($id)
// {
//     $booking = Booking::with(['booking_items.vehicle.carModel', 'user', 'car'])->findOrFail($id);

//     if (auth()->user()->role === 'company') {
//         $booking->booking_items = $booking->booking_items->filter(function ($item) {
//             return $item->vehicle && $item->vehicle->user_id == auth()->id();
//         })->values(); 
//     }

//     return view('admin.carBooking.carBookingDetail', compact('booking'));
// }

}
