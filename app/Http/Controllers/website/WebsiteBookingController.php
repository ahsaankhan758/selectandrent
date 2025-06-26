<?php

namespace App\Http\Controllers\website;

use App\Mail\BookingCancelledMail;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    public function cancel(Request $request){
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'cancel_reason' => 'required|string|max:1000',
        ]);
        $booking = Booking::find($validated['booking_id']);
        if (
            $booking->booking_items->isEmpty() ||
            Carbon::parse($booking->booking_items->first()->pickup_datetime)->lt(Carbon::now())
        ) {
            return response()->json([
                'status' => 'error',
                'message' => 'You cannot cancel this booking because the pickup time has already passed.',
            ]);
        }
           

       
        $booking->booking_status = 'cancelled';
        $booking->notes = $validated['cancel_reason'];
        $booking->cancelled_by = auth()->id();
        $booking->save();

        if($validated['booking_id']){
            $car = Car::find($booking->booking_items->first()->vehicle->id);
            $car->is_booked = 0;
            $car->save();
            //Notifications
            $notificationType = 3; 
            $fromUserId = auth()->id(); 
            $toUserId = $car->user_id;
            $userId = $car->user_id; 
            $message = 'Booking has been Cancelled by ('.auth()->user()->name.') for your Vehicle: ' . $car->lisence_plate. ' With Booking Refernce: '.$booking->booking_reference ;
            saveNotification($notificationType, $fromUserId, $toUserId, $userId, $message);
            if(!empty($car->u_employee_id)){
                $toUserId = $car->u_employee_id;
                $userId = $car->u_employee_id; 
                saveNotification($notificationType, $fromUserId, $toUserId, $userId, $message);
            }
        }
        

        Mail::to($booking->user->email)->send(new BookingCancelledMail($booking,  'customer'));
        Mail::to($booking->booking_items->first()?->vehicle?->users->email)->send(new BookingCancelledMail($booking,  'owner'));

        return response()->json([
            'status' => 'success',
            'message' => 'Booking Cancelled',
        ]);
    }
    
}
