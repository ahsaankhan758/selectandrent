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
use Illuminate\Support\Facades\Validator;


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
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
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
            $amount = (int) round($bookingData['total'][0] * 100); // Convert to cents
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
                'booking_reference' => $bookingData['booking_reference'][0],
                'subtotal' => $bookingData['subtotal'][0],
                'total_price' => $bookingData['total'][0],
                'tax_amount' => $bookingData['tax'][0],
                'payment_status' => 'pending',
                'booking_status' => 'pending',
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
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => 'Vehicle Booking',
                            ],
                            'unit_amount' => $amount,
                        ],
                        'quantity' => 1,
                    ]],
                    'mode' => 'payment',
                    'success_url' => route('booking.thankyou', ['ref' => $booking->booking_reference]),
                    'cancel_url' => route('booking.cancel', ['ref' => $booking->booking_reference]),
                ]);
    
                return redirect($session->url);
            }
    
            // Placeholder for other gateways
            return response()->json([
                'status' => true,
                'message' => 'Booking created. Proceed with manual payment or other gateways.',
                'redirect_url' => route('booking.success'),
            ]);
    
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
        return view('website.order_cancelled'); 
    }

}
