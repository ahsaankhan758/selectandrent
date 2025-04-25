<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function checkoutView(Request $request)
    {
        $ref = $request->query('ref');
        Cart::instance('cart')->destroy();
        if ($ref) {
            $booking = Booking::where('booking_reference', $ref)->first();
            if ($booking) {
                $booking->update(['payment_status' => 'paid', 'booking_status' => 'confirmed']);
            }
        }

        return view('website.bookings.checkout',compact('booking')); 
    }
}
