<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\CarCategory;
use App\Models\CarModel;
use App\Models\CarLocation;


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

    // Apply Car Model Filter
    if ($request->has('car_model_id') && !empty($request->car_model_id)) {
        $query->where('car_model_id', $request->car_model_id);
    }

   // *Apply Address (Search Location Name)*
   if ($request->has('address') && !empty($request->address)) {
    echo "<pre>";
    print_r($request->all());die;
    $query->whereHas('car_locations', function ($q) use ($request) {
        $q->where('area_name', 'LIKE', '%' . $request->address . '%'); // Search in car_locations table
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
        $query->where('car_category_id', $request->category_id); // Correct column name
    }
        

    // Get Total Filtered Count
    $filteredCarsCount = $query->count();

    // Get total cars
    $totalCars = Car::count();

    // Get all categories with car count
    $categories = CarCategory::withCount('cars')->get();

    // Get all car models
    $carModel = CarModel::all();

    // Get the first 8 cars for initial load
    $cars = $query->take(8)->get();

    if ($request->ajax()) {
        return response()->json([
            'data' => view('website.car-listing.car-listing-filters.car-list', ['cars' => $cars])->render(),
            'filteredCount' => $filteredCarsCount,
            'totalCars' => $totalCars
        ]);
    }

    return view('website.car-listing.car-listing', compact('cars', 'totalCars', 'categories', 'carModel'));
}


    
public function loadMoreCars(Request $request)
{
    $model = $request->model; 
    $offset = $request->offset;
    
    $modelClass = "App\\Models\\" . ucfirst($model);
    if (!class_exists($modelClass)) {
        return response()->json(['error' => 'Invalid Model'], 400);
    }

    // **Apply Filters if Available**
    $query = $modelClass::query();

    if ($request->has('transmission') && !empty($request->transmission)) {
        $query->where('transmission', $request->transmission);
    }

    if ($request->has('sort')) {
        if ($request->sort == 'low_to_high') {
            $query->orderBy('rent', 'asc');
        } elseif ($request->sort == 'high_to_low') {
            $query->orderBy('rent', 'desc');
        }
    } else {
        $query->latest();
    }

    if ($request->has('car_model_id') && !empty($request->car_model_id)) {
        $query->where('car_model_id', $request->car_model_id);
    }

    if ($request->has('address') && !empty($request->address)) {
        $query->whereHas('car_locations', function ($q) use ($request) {
            $q->where('city', 'LIKE', '%' . $request->address . '%');
        });
    }

    if ($request->has('date') && !empty($request->date)) {
        $dateTime = $request->date;
        if ($request->has('time') && !empty($request->time)) {
            $dateTime .= ' ' . $request->time;
            $query->where('created_at', '>=', $dateTime);
        } else {
            $query->whereDate('created_at', '=', $request->date);
        }
    }

    if ($request->has('category_id') && !empty($request->category_id)) {
        $query->where('car_category_id', $request->category_id);
    }

    // **Ensure Load More Uses the Filtered Data**
    $filteredCount = $query->count();
    $cars = $query->skip($offset)->take(8)->get();
    $hasMore = $filteredCount > ($offset + 8);

    return response()->json([
        'data' => view("website.car-listing.include.car-listing-load-more-cards", compact('cars'))->render(),
        'hasMore' => $hasMore,
        'filteredCount' => $filteredCount
    ]);
}



    // get car model name for filter samrt dropdown
    public function getCarModels()
    {
        $models = CarModel::all();
        return response()->json($models);
    }

    public function searchLocations(Request $request)
{
    $search = $request->input('query');
    echo "<pre>";
    print_r($request->all());die;
    // Fetch matching cities from `car_locations` table
    $locations = CarLocation::where('area_name', 'LIKE', '%' . $search . '%')
        ->limit(10)
        ->get(['id', 'area_name']);

    return response()->json($locations);
}


    
}
