<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingItem;
use App\Models\Car;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Checkout\Session as StripeSession;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function checkoutView(Request $request)
    {
        $ref = $request->query('ref');
        $encodedBooking = $request->query('bookingData');
        $sessionId = $request->query('session_id');

        Cart::instance('cart')->destroy();

        $booking = null;

        if ($ref && $encodedBooking) {
                    
                $bookingData = unserialize(base64_decode($encodedBooking));
                $bookingItems = $bookingData['vehicles'];
                DB::beginTransaction();
                $transactionId = '';
                if($bookingData['payment_method'] == 'stripe'){
                    $gateway = payment($bookingData['payment_method']);
                    Stripe::setApiKey($gateway->c2); // your secret key
                    // Retrieve the checkout session from Stripe
                    $session = StripeSession::retrieve($sessionId);
                    
                    $paymentIntentId = $session->payment_intent;
                    $paymentIntent = PaymentIntent::retrieve($paymentIntentId);
                     
                    // Get Stripe transaction ID (i.e., charge ID)
                    $transactionId = $paymentIntent->id ?? null;
                   
                }
                
                $bookingExist = Booking::where('booking_reference', $ref)->first();
                if(empty($bookingExist)) {
                // 1. Create booking
                $booking = Booking::create([
                    'user_id' => $bookingData['user_id'],
                    'first_name' => $bookingData['first_name'],
                    'last_name' => $bookingData['last_name'],
                    'email' => $bookingData['email'],
                    'phonenumber' => $bookingData['phonenumber'],
                    'city' => $bookingData['city'],
                    'transaction_id' => $transactionId,
                    'country' => $bookingData['country'],
                    'postal_code' => $bookingData['postal_code'],
                    'billing_addresss' => $bookingData['billing_addresss'],
                    'booking_reference' => $bookingData['reference_number'],
                    'subtotal' => $bookingData['subtotal'],
                    'total_price' => $bookingData['total'],
                    'commission' => $bookingData['commission'],
                    'currency' => $bookingData['currency'],
                    'tax_amount' => $bookingData['tax_amount'],
                    'payment_status' => 'paid',
                    'booking_status' => 'confirmed',
                    'payment_method' => $bookingData['payment_method'],
                    'insurance_included' => $bookingData['insurance_included'],
                ]);

                // Create booking items
                foreach ($bookingItems['vehicleId'] as $i => $vehicleId) {
                    BookingItem::create([
                        'booking_id' => $booking->id,
                        'vehicle_id' => $vehicleId,
                        'pickup_location' => $bookingItems['pickup_location'][$i],
                        'dropoff_location' => $bookingItems['dropoff_location'][$i],
                        'pickup_datetime' => $bookingItems['pickup_datetime'][$i],
                        'dropoff_datetime' => $bookingItems['dropoff_datetime'][$i],
                        'duration_days' => $bookingItems['duration'][$i], // fixed
                        'price_per_day' => $bookingItems['price_per_day'][$i],
                        'total_price' => $bookingItems['item_price'][$i], // fixed
                    ]);
                }
                
               
                // 3. Mark vehicle as booked and notify owner
                $vehicleId = BookingItem::where('booking_id', $booking->id)->first()->vehicle_id ?? null;
                
                Car::where('id', $vehicleId)->update(['is_booked' => '1']);
                $car = Car::with('users')->find($vehicleId);
                if ($car) {
                    $notificationType = 2; // customer placed order
                    $fromUserId = auth()->id();
                    $toUserId = $car->user_id;
                    $message = 'A new booking has been placed for your Vehicle: ' . $car->lisence_plate;
                    saveNotification($notificationType, $fromUserId, $toUserId, $toUserId, $message);
                }

                $bookingItems = BookingItem::where('booking_id', $booking->id)->get();
                // Send email to customer
                 Mail::send('website.email.bookingorder', [
                    'booking' => $booking,
                    'bookingItems' => $bookingItems,
                    'currency' => $booking->currency,
                ], function ($message) use ($booking) {
                    $message->to($booking->email)->subject('Your Booking Confirmation - ' . $booking->booking_reference);
                });
                // Send email to each vehicle's company
                foreach ($bookingItems as $item) {
                    $vehicle = \App\Models\BookingItem::find($item->vehicle_id);
                    if ($vehicle && $vehicle->company_email) {
                        Mail::send('website.email.bookingorder', [
                            'booking' => $booking,
                            'bookingItems' => [$item], // send only related item
                            'currency' => $booking->currency,
                        ], function ($message) use ($vehicle, $booking) {
                            $message->to($vehicle->company_email)
                                    ->subject('New Booking Received - ' . $booking->booking_reference);
                        });
                    }
                }
                DB::commit();

                } else {
                    $booking = $bookingExist;
                }
            } else {
               
                return view('website.bookings.booking_error', [
                    'message' => 'Payment was successful but booking creation failed. Please contact support.',
                ]);
            }
        

        return view('website.bookings.checkout', compact('booking'));
    }




}
