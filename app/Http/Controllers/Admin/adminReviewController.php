<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class adminReviewController extends Controller
{
    public function vehicleReview()
    {
        $owner = EmployeeOwner(auth()->id());

        $reviews = Review::with(['user', 'vehicle'])
        ->when(Auth::user()->role === 'company', function ($query) {
            $query->whereHas('vehicle', function ($q) {
                $q->where('user_id', Auth::id());
            });
        })
        ->orderBy('created_at', 'desc')->get();

        return view('admin.review.vehicleReview', compact('reviews'));
    }

}
