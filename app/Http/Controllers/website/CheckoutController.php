<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class CheckoutController extends Controller
{
    public function checkoutView(Request $request)
    {
        $ref = $request->query('ref');
        if ($ref) {
            $booking = Booking::where('booking_reference', $ref)->first();
            if ($booking) {
                $booking->update(['payment_status' => 'paid', 'booking_status' => 'confirmed']);
            }
        }

        return view('website.checkout'); 
    }
}
