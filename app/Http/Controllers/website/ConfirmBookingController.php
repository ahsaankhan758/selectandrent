<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\PaymentGateways;
use App\Models\Booking;
use App\Models\BookingItem;

class ConfirmBookingController extends Controller
{
    public function confirmBookingView(Request $request)
    {
        $rules = [
            'user_id'             => 'required|array',
            'user_id.*'           => 'required|integer|exists:users,id',

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

        // Additional manual validation: dropoff must be after pickup
        foreach ($request->pickup_datetime as $index => $pickup) {
            $dropoff = $request->dropoff_datetime[$index] ?? null;

            if ($dropoff && strtotime($dropoff) <= strtotime($pickup)) {
                return redirect()->back()
                    ->withErrors(["dropoff_datetime.$index" => 'Drop-off must be after pickup.'])
                    ->withInput();
            }
        }

        $checkoutData = $request->all();
        $paymentGateways = PaymentGateways::all();
        return view('website.booking-confirm', compact('checkoutData','paymentGateways'));
    }


public function confirmBooking(Request $request)
{
    $rules = [
        'user_id'             => 'required|array',
        'user_id.*'           => 'required|integer|exists:users,id',
    
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

    // Run validation
    $validator = Validator::make($request->all(), $rules);

    // Handle failure
    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors(),
        ], 422);
    }

    // Additional manual validation: dropoff must be after pickup
    foreach ($request->pickup_datetime as $index => $pickup) {
        $dropoff = $request->dropoff_datetime[$index] ?? null;

        if ($dropoff && strtotime($dropoff) <= strtotime($pickup)) {
            return response()->json([
                'status' => false,
                'errors' => [
                    "dropoff_datetime.$index" => ['Drop-off must be after pickup.'],
                ]
            ], 422);
        }
    }


    try {
        DB::beginTransaction();
        // echo "<pre>";
        // print_r($request->all());die;
        // Create main booking
        $booking = Booking::create([
            'user_id' => $request->user_id[0],
            'booking_reference' => $request->booking_reference[0],
            'subtotal' => $request->subtotal,
            'total_price' => $request->total,
            'tax_amount' => $request->tax,
            'payment_status' => 'pending',
            'booking_status' => 'without-payment',
            'insurance_included' => 0,
        ]);

        $count = count($request->vehicleId);

        for ($i = 0; $i < $count; $i++) {
            BookingItem::create([
                'booking_id'        => $booking->id,
                'vehicle_id'        => $request->vehicleId[$i],
                'pickup_location'   => $request->pickup_location[$i],
                'dropoff_location'  => $request->dropoff_location[$i],
                'pickup_datetime'   => $request->pickup_datetime[$i],
                'dropoff_datetime'  => $request->dropoff_datetime[$i],
                'duration_days'     => $request->duration[$i],
                'price_per_day'     => $request->price_per_day[$i],
                'total_price'       => $request->total_price_item[$i],
                'driver_required'   => 0,
            ]);
        }

        DB::commit();

        return response()->json([
            'status' => true,
            'message' => 'Booking placed successfully!',
            'redirect_url' => route('booking.success')
        ]);

    } catch (\Exception $e) {
        DB::rollBack();

        return response()->json([
            'status' => false,
            'message' => 'Something went wrong. Please try again.',
            'error' => $e->getMessage(), // Optional: only show in debug mode
        ], 500);
    }
}


}
