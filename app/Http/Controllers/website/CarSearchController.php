<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\CarCategory;
use App\Models\CarModel;
use App\Models\CarLocation;
use Illuminate\Support\Facades\Session;

class CarSearchController extends Controller
{
    public function CarSearchView(Request $request)
{
      $query = Car::query();
      $query->where('status', 1);
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

    // Apply Car Model Filter
    if ($request->has('car_model_id') && !empty($request->car_model_id)) {
        $query->where('car_model_id', $request->car_model_id);
    }

   // *Apply Address (Search Location Name)*
   if ($request->has('address') && !empty($request->address)) {
    $query->whereHas('car_locations', function ($q) use ($request) {
        $q->where('city', 'LIKE', '%' . $request->address . '%'); 
    });
    }   

    // Apply Date & Time Filter
    if ($request->has('date') && !empty($request->date)) {
        $dateTime = $request->date;

        if ($request->has('time') && !empty($request->time)) {
            $dateTime .= ' ' . $request->time;
            $query->where('created_at', '>=', $dateTime);
        } else {
            $query->whereDate('created_at', '=', $request->date);
        }
    }

    // Apply Category Filter
    if ($request->has('category_id') && !empty($request->category_id)) {
        $query->where('car_category_id', $request->category_id); 
    }
        

    // Get Total Filtered Count
    $filteredCarsCount = $query->count();

    // Get total cars
    $totalCars = Car::count();

    $allCarsCount = Car::count();

    // Get all categories with car count
    $categories = CarCategory::withCount(['cars' => function ($query) {
        $query->where('status', 1);
    }])->get();

    // Get all car models
    $carModel = CarModel::all();

    // Get the first 6 cars for initial load
    $cars = $query->take(6)->get();

    if ($request->ajax()) {
        return response()->json([
            'data' => view('website.car-listing.car-listing-filters.car-list', ['cars' => $cars])->render(),
            'filteredCount' => $filteredCarsCount,
            'allCarsCount' => $allCarsCount,
            'totalCars' => $totalCars
        ]);
    }
    $cars = session('searchedCars', []);
    return view('website.carsearch', compact('cars', 'allCarsCount', 'totalCars', 'categories', 'carModel'));
}

}
