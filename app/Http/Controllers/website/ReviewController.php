<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Car;

class ReviewController extends Controller
{
    //
   public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:cars,id',
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1500',
        ]);

        $existingReview = Review::where('user_id', auth()->id())
            ->where('booking_id', $validated['booking_id'])
            ->first();

        if ($existingReview) {
            return response()->json([
                'status' => 'error',
                'message' => 'You have already reviewed this Booking.',
            ]); 
        }

        Review::create([
            'user_id' => auth()->id(),
            'vehicle_id' => $validated['vehicle_id'],
            'booking_id' => $validated['booking_id'],
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);

        // Step 3: Send notification to vehicle company 
        if ($validated['vehicle_id']) {

            $car = Car::with('users')->find($validated['vehicle_id']);
            $notificationType = 5; // review save against vehicle car
            $fromUserId = auth()->id(); // logged in user
            $toUserId = $car->user_id;
            $userId = $car->user_id; 
            $message = 'A new review from ('.auth()->user()->name.') has been submitted for your Vehicle: ' . $car->lisence_plate;
            saveNotification($notificationType, $fromUserId, $toUserId, $userId, $message);

        }


        return response()->json([
            'status' => 'success',
            'message' => 'Review submitted successfully.',
        ]);
    }


}
