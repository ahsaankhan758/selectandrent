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
use App\Models\GeneralModule;
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
            // get comission by select and rent
            $commission = GeneralModule::with(['user' => function ($query) {
                $query->where('role', 'admin');
            }])->where('user_id', 2)->first();
            $commissionPercentage = $commission->commissions;
            $commissionRate = $commissionPercentage / 100; // commission rate
            $total_commission = $bookingData['total'][0] * $commissionRate;
            // 
            // currency code
            $currencyCode = session('defaultCurrencyCode');
            if (empty($currencyCode)) {
                $currencyCode = Currency::where('is_default', 'Yes')->where('is_active','Yes')->value('code');
            }
            
            if (!is_array($bookingData) || empty($bookingData['total'][0])) {
                throw new \Exception('Invalid booking data.');
            }
    
            $method = $request->paymentMethod;
            $gateway = payment($method);
            $amount = (int) round($bookingData['total'][0] * 100);
           
            DB::beginTransaction();
            
            
            $bookingTempData = [
                'user_id' => $request->user_id,
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'email' => $request->email,
                'phonenumber' => $request->phonenumber,
                'city' => $request->city,
                'country' => $request->country,
                'postal_code' => $request->postal_code,
                'billing_addresss' => $request->billing_addresss,
                'reference_number' => $request->reference_number,
                'subtotal' => $bookingData['subtotal'][0],
                'total' => $bookingData['total'][0],
                'commission' => $total_commission,
                'currency' => $currencyCode,
                'tax_amount' => $bookingData['tax'][0],
                'payment_method' => $method,
                'vehicles' => $bookingData, // full array with vehicle info
                'insurance_included' => 0,
            ];

            $encodedBooking = base64_encode(serialize($bookingTempData));
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
                        'currency' => $currencyCode,
                        'product_data' => [
                            'name' => $request->reference_number,

                        ],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'customer_email' => $request->email,
                'success_url' => route('booking.thankyou') . 
        '?ref=' . $request->reference_number . 
        '&session_id={CHECKOUT_SESSION_ID}' .
        '&bookingData=' . urlencode($encodedBooking),
                'cancel_url' => route('booking.cancel', ['ref' => $request->reference_number]),
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
