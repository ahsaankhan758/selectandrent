<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingItem;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use App\Models\Car;
use App\Models\User;

class CheckoutController extends Controller
{
    public function checkoutView(Request $request)
    {
        $ref = $request->query('ref');
        Cart::instance('cart')->destroy();
        $booking = null;
        if ($ref) {

            $booking = Booking::where('booking_reference', $ref)->first();
            if ($booking->booking_status == 'pending') {
                $booking->update([
                    'payment_status' => 'paid',
                    'booking_status' => 'confirmed',
                ]);

                $vehicleId = BookingItem::where('booking_id', $booking->id)->first()->vehicle_id ?? null;

                if ($vehicleId) {
                   Car::where('id', $vehicleId)->update(['is_booked' => '1']);
                    $car = Car::with('users')->find($vehicleId);

                    if ($car) {
                        // Step 3: Send notification to company owner
                        $notificationType = 2; // customer placed order
                        $fromUserId = auth()->id(); // logged in user
                        $toUserId = $car->user_id;
                        $userId = $car->user_id; 
                        $message = 'A new booking has been placed for your Vehicle: ' . $car->lisence_plate;
                        saveNotification($notificationType, $fromUserId, $toUserId, $userId, $message);
                    }
                }
            } 
        }
        // Step 4: Return view
        return view('website.bookings.checkout', compact('booking'));
    }

}
