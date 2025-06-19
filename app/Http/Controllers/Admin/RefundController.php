<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefundController extends Controller
{
    public function index(){
        $bookings = Booking::whereIn('booking_status', ['cancelled', 'refunded'])
                    ->whereIn('payment_status', ['paid', 'refunded'])
                   ->paginate(20); 
        return view('admin.refunds.index', compact('bookings'));
    }
    public function refund(Request $request){
        $validatedData = $request->validate([
            'booking_id' => 'required',
            'refunded_reason' => 'required_unless:refunded_reason,other',
            'refunded_reason_other' => 'required_if:refunded_reason,other',
        ]);
        $booking = Booking::find($validatedData['booking_id']);
        $booking->payment_status = 'refunded';
        $booking->booking_status = 'refunded';
        $booking->refunded_by  = Auth::id();
        $booking->refunded_note = $validatedData['refunded_reason'] === 'other'
        ? $validatedData['refunded_reason_other']
        : $validatedData['refunded_reason'];

        $booking->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Refund Issued Successfully.',
        ]);

    }
}
