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

    // Common filter values
    $companyUserId = $request->user_id ?? null;
    $countryId = $request->country_id ?? null;
    $startDate = $request->start_date ? date('Y-m-d', strtotime($request->start_date)) : null;
    $endDate = $request->end_date ? date('Y-m-d', strtotime($request->end_date)) : null;

    // Apply shared filters
    if ($companyUserId) {
        $query->whereHas('booking_items.vehicle', function ($q) use ($companyUserId) {
            $q->where('user_id', $companyUserId);
        });
    }

    if ($countryId) {
        $companyUserIds = Company::where('country_id', $countryId)->pluck('user_id')->toArray();
        $query->whereHas('booking_items.vehicle', function ($q) use ($companyUserIds) {
            $q->whereIn('user_id', $companyUserIds);
        });
    }

    if ($startDate && $endDate) {
        $query->whereDate('created_at', '>=', $startDate)
              ->whereDate('created_at', '<=', $endDate);
    }

    // Company role filter
    if (Auth::user()->role === 'company') {
        $query->whereHas('booking_items.vehicle', function ($q) {
            $q->where('user_id', Auth::id());
        });
    }

    // Specific filters based on clicked card
    switch ($request->filter) {
        case 'revenue':
            $query->where('payment_status', 'paid')
                  ->whereIn('booking_status', ['completed', 'confirmed']);
            break;

        case 'pending':
            $query->where('payment_status', 'pending')
                  ->where('booking_status', 'pending');
            break;
        
          case 'commission':
        $query->where('payment_status', 'paid')->where('commission', '>', 0);
        break;    

        case 'cancelled_today':
            $query->where('payment_status', 'failed')
                  ->whereDate('created_at', Carbon::today());
            break;

        case 'confirmed':
            $query->where('booking_status', 'confirmed');
            break;

        case 'completed':
            $query->where('booking_status', 'completed');
            break;

        case 'cancelled':
            $query->where('booking_status', 'cancelled');
            break;

        default:
            break;
    }

    $bookings = $query->paginate(10);
    return view('admin.carBooking.carBooking', compact('bookings'));
}

    // public function index(Request $request)
    // {
    //     $query = Booking::with(['booking_items.vehicle.carModel', 'user', 'car']);

    //     if (Auth::user()->role === 'company') {
    //         $query->whereHas('booking_items.vehicle', function ($q) {
    //             $q->where('user_id', Auth::id());
    //         });
    //     }

    //     // For cancelled 
    //         if ($request->payment_status === 'failed' && $request->date === 'today') {
    //             $query->where('payment_status', 'failed')
    //                 ->whereDate('created_at', Carbon::today());
    //         }

    //         // For commission 
    //         if ($request->payment_status === 'paid') {
    //             $query->where('payment_status', 'paid');
    //         }

    //     // for Revenue card
    //         if (in_array($request->status, ['completed', 'confirmed'])) {
    //         $query->where('payment_status', 'paid')
    //             ->whereIn('booking_status', ['completed', 'confirmed']);
    //         }
    //         // for pending card
    //         if (in_array($request->status, ['pending'])) {
    //         $query->where('payment_status', 'pending')
    //             ->whereIn('booking_status', ['pending']);
    //         }

    //     // For confirmed on booking dashboard
    //     if ($request->booking_status === 'confirmed') {
    //         $query->where('booking_status', 'confirmed');
    //     }

    //     // For completed on booking dashboard
    //     if ($request->booking_status === 'completed') {
    //         $query->where('booking_status', 'completed');
    //     }

    //     // For cancelled on booking dashboard
    //     if ($request->booking_status === 'cancelled') {
    //         $query->where('booking_status', 'cancelled');
    //     }

    //     // For pending on booking dashboard
    //     if ($request->booking_status === 'pending') {
    //         $query->where('booking_status', 'pending');
    //     }

    //     $bookings = $query->paginate(10);

    //     return view('admin.carBooking.carBooking', compact('bookings'));
    // }

    // public function carBookingDetail($id)
    // {
    //     $booking = Booking::with(['booking_items.vehicle.carModel', 'user','car'])->findOrFail($id);
    //     return view('admin.carBooking.carBookingDetail', compact('booking'));
    // }
public function carBookingDetail($id, $source)
{
    $booking = Booking::with([
        'booking_items.vehicle.carModel', 
        'booking_items.pickupLocation',
        'booking_items.dropoffLocation',
        'user', 
        'car'
    ])->findOrFail($id);

    return view('admin.carBooking.carBookingDetail', compact('booking', 'source'));
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
