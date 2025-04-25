<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\website\Auth;

use App\Models\PaymentGateways;



class ConfirmBookingController extends Controller
{
    public function confirmBookingView(Request $request)
    {
        $rules = [

            'pickup_location'     => 'required|array',
            'pickup_location.*'   => 'required|exists:car_locations,id',

            'dropoff_location'    => 'required|array',
            'dropoff_location.*'  => 'required|exists:car_locations,id',

            'pickup_datetime'     => 'required|array',
            'pickup_datetime.*'   => 'required|date',

            'dropoff_datetime'    => 'required|array',
            'dropoff_datetime.*'  => 'required|date',

            'duration'            => 'required|array',
            'duration.*'          => 'required|numeric|min:1',

            'price_per_day'       => 'required|array',
            'price_per_day.*'     => 'required|numeric|min:0',

            'booking_reference'   => 'required|array',
            'booking_reference.*' => 'required|string',

            'subtotal'            => 'required|array',
            'subtotal.*'          => 'required|numeric|min:0',

            'tax'                 => 'required|array',
            'tax.*'               => 'required|numeric|min:0',

            'total'               => 'required|array',
            'total.*'             => 'required|numeric|min:0',
        ];

        $validated = $request->validate($rules);

        foreach ($request->pickup_datetime as $index => $pickup) {
            $dropoff = $request->dropoff_datetime[$index] ?? null;
            if ($dropoff && strtotime($dropoff) <= strtotime($pickup)) {
                return response()->json([
                    'status' => false,
                    'errors' => ["dropoff_datetime.$index" => 'Drop-off must be after pickup.']
                ], 422);
            }
        }

        $checkoutData = $request->all();
        
        $paymentGateways = PaymentGateways::all();
        $html = view('website.bookings.include.booking-confirm', compact('checkoutData','paymentGateways'))->render();
        
        return response()->json([
            'status' => true,
            'message' => "Booking Confirm",
            'html' => $html,
        ], 200);

    }

    public function confirmBooking(Request $request){

        $paymentGateways = PaymentGateways::all();
        return view('website.bookings.include.booking-confirm', compact('checkoutData','paymentGateways'));
        
    }

}
