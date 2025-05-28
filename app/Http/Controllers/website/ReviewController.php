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
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1500',
        ]);

        Review::create([
            'user_id' => auth()->id(), // Ensure user is logged in
            'vehicle_id' => $validated['vehicle_id'], // vehicle_id maps to car_id
            'rating' => $validated['rating'],
            'comment' => $validated['comment'], // Can be null
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Review submitted successfully.',
        ]);
    }

}
