<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerReview;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerReviewController extends Controller
{
    public function store(Request $request)
     {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'customer_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1500',
        ]);

        $existingReview = CustomerReview::where('booking_id', $validated['booking_id'])->first();

        if ($existingReview) {
            return response()->json([
                'status' => 'error',
                'message' => 'You have already reviewed this Booking.',
            ]); 
        }
        
        CustomerReview::create([
            'user_id' => auth()->id(),
            'c_user_id' => $validated['customer_id'],
            'booking_id' => $validated['booking_id'],
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);

        // Step 3: Send notification to vehicle company 
         $notificationType = 1; // review save against vehicle car
         $fromUserId = auth()->id(); // logged in user
         $toUserId = $validated['customer_id'];
         $userId = $validated['customer_id']; 
         $message = 'A new review from ('.auth()->user()->name.') has been submitted for You.';
         saveNotification($notificationType, $fromUserId, $toUserId, $userId, $message);

        


        return response()->json([
            'status' => 'success',
            'message' => 'Review submitted successfully.',
        ]);
     }
}
