<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarCategory;
use App\Models\Car;

class CategoryController extends Controller
{
    public function categoryView()
{
    $categories = CarCategory::all();
    $cars = Car::where('status', 1)->latest()->take(6)->get();

    $totalCars = Car::where('status', 1)->count();
    return view('website.category.categories', compact('categories', 'cars','totalCars'));
}

// public function loadMoreCategoryCars(Request $request)
// {
//     $model = $request->model;
//     $categoryId = $request->car_category_id;
//     $offset = intval($request->offset ?? 0);

//     // Validate if the model exists
//     $modelClass = "App\\Models\\" . ucfirst($model);
//     if (!class_exists($modelClass)) {
//         return response()->json(['error' => 'Invalid Model'], 400);
//     }

//     // Build query
//     $query = $modelClass::latest();

//     // Apply category filter if provided
//     if ($categoryId && $categoryId !== "All") {
//         $query->where('car_category_id', $categoryId);
//     }
    
//     // Get total count before pagination
//     $totalCars = $query->count();

//     // Fetch records with pagination
//     $cars = $query->skip($offset)->take(8)->get();

//     // Correct hasMore calculation
//     $hasMore = ($offset + count($cars)) < $totalCars;

//     return response()->json([
//         'cars' => view("website.category.include.car-item", compact('cars'))->render(),
//         'hasMore' => $hasMore
//     ]);
// }  
public function loadMoreCategoryCars(Request $request)
{
    $model = $request->model;
    $offset = intval($request->offset ?? 0);
    $categoryId = null;

    if ($request->category_name && $request->category_name !== "All") {
        $category = \App\Models\CarCategory::where('name', $request->category_name)->first();
        if ($category) {
            $categoryId = $category->id;
        } else {
            return response()->json([
                'cars' => '',
                'hasMore' => false
            ]);
        }
    } else if ($request->car_category_id && $request->car_category_id !== "All") {
        $categoryId = $request->car_category_id;
    }

    $modelClass = "App\\Models\\" . ucfirst($model);
    if (!class_exists($modelClass)) {
        return response()->json(['error' => 'Invalid Model'], 400);
    }

    $query = $modelClass::latest();
    if ($categoryId) {
        $query->where('car_category_id', $categoryId);
    }

    $totalCars = $query->count();
    $cars = $query->skip($offset)->take(6)->get();
    $hasMore = ($offset + count($cars)) < $totalCars;

    return response()->json([
        'cars' => view("website.category.include.car-item", compact('cars'))->render(),
        'hasMore' => $hasMore
    ]);
}



public function loadMoreCars(Request $request)
{
    try {
        $offset = intval($request->query('offset', 0)); 

        $cars = Car::where('status', 1)->latest()->skip($offset)->take(6)->get();

        $totalCars = Car::where('status', 1)->count();
        $hasMore = ($offset + 6) < $totalCars;

        return response()->json([
            'cars' => view('website.category.include.car-item', ['cars' => $cars])->render(),
            'hasMore' => $hasMore
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


public function carCategorize(Request $request)
{
    $categoryId = $request->car_category_id;
    $offset = intval($request->query('offset', 0));

    $query = Car::with(['car_categories', 'car_models']);

    if ($categoryId !== "All") {
        $query->where('car_category_id', $categoryId);
    }

    $cars = $query->where('status', 1)->latest()->skip($offset)->take(6)->get();
    $totalCars = $query->count(); 
    $hasMore = ($offset + 6) < $totalCars; 

    return response()->json([
        'cars' => view('website.category.include.carsCategory', compact('cars'))->render(),
        'hasMore' => $hasMore
    ]);
}

}
