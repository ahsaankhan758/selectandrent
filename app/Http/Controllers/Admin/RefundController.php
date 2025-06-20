<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\RefundedMail;
use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        // Notification
        // To Customer
        $notificationType = 5; // review save against vehicle car
        $fromUserId = auth()->id(); // logged in user
        $toUserId = $booking->user_id;
        $userId = $booking->user_id; 
        $message = 'Refund for your booking Reference:'. $booking->booking_reference .' has been successfully processed';
        saveNotification($notificationType, $fromUserId, $toUserId, $userId, $message);
        $car = Car::find($booking->booking_items->first()->vehicle->id);
        if(auth()->user()->role == 'employee'){
            // To Compnay
            $toUserId = $car->user_id;
            $userId = $car->user_id; 
            $message = 'Refund for your booking Reference:'. $booking->booking_reference .' has been successfully Issued By Your Employee: '.auth()->user()->name;
            saveNotification($notificationType, $fromUserId, $toUserId, $userId, $message);
            //To Employee
            $toUserId = auth()->id();
            $userId = auth()->id(); 
            $message = 'Refund for your booking Reference:'. $booking->booking_reference .' has been successfully Issued ';
            saveNotification($notificationType, $fromUserId, $toUserId, $userId, $message);
        }

        Mail::to($booking->user->email)->send(new RefundedMail($booking,  'customer'));
        Mail::to($booking->booking_items->first()?->vehicle?->users->email)->send(new RefundedMail($booking,  'company'));

        return response()->json([
            'status' => 'success',
            'message' => 'Refund Issued Successfully.',
        ]);

    }
}
