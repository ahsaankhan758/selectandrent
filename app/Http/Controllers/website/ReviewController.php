<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

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

        return response()->json([
            'status' => 'success',
            'message' => 'Review submitted successfully.',
        ]);
    }


}
