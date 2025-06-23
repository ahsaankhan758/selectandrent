<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Car;
use App\Models\Review;


class carDetailController extends Controller
{
    public function cardetailView($id)
    {
        $vehicle = Car::findOrFail($id);

        $vehicles = Car::orderBy('created_at', 'desc')->take(7)->get();

        $reviews = Review::with('user')->orderBy('created_at', 'desc')->where('vehicle_id', $id)->get();

        if ($reviews->count() > 0) {
            $averageRating = round($reviews->avg('rating'), 1); // e.g., 4.2 out of 5
        } else {
            $averageRating = 0; 
        }

        // echo "Rating: {$averageRating} / 5";die;

        return view('website.car-detail', compact('vehicle', 'vehicles', 'reviews', 'averageRating'));

    }
}
