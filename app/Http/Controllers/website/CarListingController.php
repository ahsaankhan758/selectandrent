<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Car;


class CarListingController extends Controller
{
    public function carListingView(Request $request)
{
    $query = Car::query();

    // Apply Transmission Filter
    if ($request->has('transmission') && !empty($request->transmission)) {
        $query->where('transmission', $request->transmission);
    }

    // Apply Sorting (Use 'rent' instead of 'price')
    if ($request->has('sort')) {
        if ($request->sort == 'low_to_high') {
            $query->orderBy('rent', 'asc');
        } elseif ($request->sort == 'high_to_low') {
            $query->orderBy('rent', 'desc');
        }
    } else {
        $query->latest();
    }

    // Get Total Filtered Count
    $filteredCarsCount = $query->count();

    // Paginate Results (Initially load 8 cars)
    $cars = $query->take(8)->get();
    $totalCars = Car::count();

    // If AJAX request, return partial view with updated count
    if ($request->ajax()) {
        return response()->json([
            'data' => view('website.car-listing.car-listing-filters.car-list', ['cars' => $cars])->render(),
            'filteredCount' => $filteredCarsCount,
            'totalCars' => $totalCars
        ]);
    }

    return view('website.car-listing.car-listing', compact('cars', 'totalCars'));
}

    

    
    public function loadMoreCars(Request $request)
    {
        $model = $request->model; 
        $offset = $request->offset;

        $modelClass = "App\\Models\\" . ucfirst($model);
        if (!class_exists($modelClass)) {
            return response()->json(['error' => 'Invalid Model'], 400);
        }

        $cars = $modelClass::latest()->skip($offset)->take(8)->get();
        $hasMore = $modelClass::count() > ($offset + 8);

        return response()->json([
            'data' => view("website.car-listing.include.car-listing-load-more-cards", compact('cars'))->render(),
            'hasMore' => $hasMore
        ]);
    }
    
    

    
    
}
