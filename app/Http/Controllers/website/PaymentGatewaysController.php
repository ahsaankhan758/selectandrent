<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use App\Models\Booking;
use App\Models\BookingItem;
use App\Models\Currency;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class PaymentGatewaysController extends Controller
{

    public function redirectToPaymentCheckout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'checkoutData' => 'required|string',
            'paymentMethod' => 'required|string',
            'user_id' => 'required|integer', 
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email',
            'phonenumber' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'postal_code' => 'required|string',
            'billing_addresss' => 'required|string',
            'reference_number' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ]);
        }
        
        if (Auth::check() && $request->email !== Auth::user()->email) {
            return response()->json([
                'status' => false,
                'message' => 'Mismatch Email.',
                'errors' => 'validation'
            ]);
        }               

        try {
            // Decode and unserialize checkout data
            $decoded_checkoutData = base64_decode($request->checkoutData);
            $bookingData = unserialize($decoded_checkoutData);
    
            if (!is_array($bookingData) || empty($bookingData['total'][0])) {
                throw new \Exception('Invalid booking data.');
            }
    
            $method = $request->paymentMethod;
            $gateway = payment($method);
            $amount = (int) round($bookingData['total'][0] * 100);
            $qty = Cart::instance('cart')->content()->count();
            // print_r($amount);
            DB::beginTransaction();
    
            // Create main booking
            $booking = Booking::create([
                'user_id' => $request->user_id,
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'email' => $request->email,
                'phonenumber' => $request->phonenumber,
                'city' => $request->city,
                'country' => $request->country,
                'postal_code' => $request->postal_code,
                'billing_addresss' => $request->billing_addresss,
                'booking_reference' => $request->reference_number,
                'subtotal' => $bookingData['subtotal'][0],
                'total_price' => $bookingData['total'][0],
                'tax_amount' => $bookingData['tax'][0],
                'payment_status' => 'pending',
                'booking_status' => 'pending',
                'payment_method' => $method,
                'insurance_included' => 0,
            ]);
    
            // Insert booking items
            foreach ($bookingData['vehicleId'] as $i => $vehicleId) {
                BookingItem::create([
                    'booking_id' => $booking->id,
                    'vehicle_id' => $vehicleId,
                    'pickup_location' => $bookingData['pickup_location'][$i],
                    'dropoff_location' => $bookingData['dropoff_location'][$i],
                    'pickup_datetime' => $bookingData['pickup_datetime'][$i],
                    'dropoff_datetime' => $bookingData['dropoff_datetime'][$i],
                    'duration_days' => $bookingData['duration'][$i],
                    'price_per_day' => $bookingData['price_per_day'][$i],
                    'total_price' => $bookingData['item_price'][$i],
                ]);
            }
    
            DB::commit();

            // Fetch booking items again to include relation

$bookingItems = BookingItem::where('booking_id', $booking->id)->get();


// currency code
$currencyCode = session('defaultCurrencyCode');
if (empty($currencyCode)) {
    $currencyCode = Currency::where('is_default', 'Yes')->where('is_active','Yes')->value('code');
}

// Send email to customer
Mail::send('website.email.bookingorder', [
    'booking' => $booking,
    'bookingItems' => $bookingItems,
    'currency' => $currencyCode,
], function ($message) use ($booking) {
    $message->to($booking->email)
            ->subject('Your Booking Confirmation - ' . $booking->booking_reference);
});


// Send email to each vehicle's company
foreach ($bookingItems as $item) {
    $vehicle = \App\Models\BookingItem::find($item->vehicle_id);
    if ($vehicle && $vehicle->company_email) {
        Mail::send('website.email.bookingorder', [
            'booking' => $booking,
            'bookingItems' => [$item], // send only related item
            'currency' => $currencyCode,
        ], function ($message) use ($vehicle, $booking) {
            $message->to($vehicle->company_email)
                    ->subject('New Booking Received - ' . $booking->booking_reference);
        });
    }
}
    
        // Handle Stripe payment
        if ($method === 'stripe') {
            if (!$gateway || empty($gateway->c2)) {
                throw new \Exception('Stripe credentials not configured.');
            }
            
            Stripe::setApiKey($gateway->c2); // secret key

            $session = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => $currencyCode,
                        'product_data' => [
                            'name' => $booking->booking_reference,

                        ],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('booking.thankyou', ['ref' => $booking->booking_reference]),
                'cancel_url' => route('booking.cancel', ['ref' => $booking->booking_reference]),
            ]);
        
            return response()->json([
                'status' => true,
                'message' => 'Redirecting to stripe payment gateway..',
                'redirect_url' => $session->url
            ]);

        }elseif($method === 'paypal'){

            return response()->json([
                'status' => false,
                'message' => 'working..',
                'redirect_url' => '',
            ]);

        }
    
    
        } catch (\Exception $e) {
            DB::rollBack();
    
            Log::error('Payment Checkout Error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
    
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        }
    }

    public function cancelPayment(Request $request)
    {
        $ref = $request->query('ref');
        if ($ref) {
            $booking = Booking::where('booking_reference', $ref)->first();
            if ($booking) {
                $booking->update(['payment_status' => 'cancelled']);
            }
        }
        return view('website.cancelled'); 
    }

}
