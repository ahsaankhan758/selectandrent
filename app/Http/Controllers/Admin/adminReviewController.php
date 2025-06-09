<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class adminReviewController extends Controller
{
  public function vehicleReview()
{
    $reviews = Review::with(['user', 'car']) ->orderBy('created_at', 'desc')->get();
    return view('admin.review.vehicleReview', compact('reviews'));
}

}
