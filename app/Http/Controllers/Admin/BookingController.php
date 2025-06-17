<?php

namespace App\Http\Controllers\Admin;
use Auth;
use Carbon\Carbon;
use App\Models\Booking;
use App\Models\BookingItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['booking_items.vehicle.carModel', 'user', 'car']);

        if (Auth::user()->role === 'company') {
            $query->whereHas('booking_items.vehicle', function ($q) {
                $q->where('user_id', Auth::id());
            });
        }

        // For cancelled 
            if ($request->payment_status === 'failed' && $request->date === 'today') {
                $query->where('payment_status', 'failed')
                    ->whereDate('created_at', Carbon::today());
            }

            // For commission 
            if ($request->payment_status === 'paid') {
                $query->where('payment_status', 'paid');
            }

        // for Revenue card
            if (in_array($request->status, ['completed', 'confirmed'])) {
            $query->where('payment_status', 'paid')
                ->whereIn('booking_status', ['completed', 'confirmed']);
            }
            // for pending card
            if (in_array($request->status, ['pending'])) {
            $query->where('payment_status', 'pending')
                ->whereIn('booking_status', ['pending']);
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
