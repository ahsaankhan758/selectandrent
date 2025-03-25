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
    $cars = Car::latest()->take(8)->get();
    $totalCars = Car::count();
    return view('website.category.categories', compact('categories', 'cars','totalCars'));
}

public function loadMoreCategoryCars(Request $request)
{
    $model = $request->model;
    $categoryId = $request->car_category_id;
    $offset = intval($request->offset ?? 0);

    // Validate if the model exists
    $modelClass = "App\\Models\\" . ucfirst($model);
    if (!class_exists($modelClass)) {
        return response()->json(['error' => 'Invalid Model'], 400);
    }

    // Build query
    $query = $modelClass::latest();

    // Apply category filter if provided
    if ($categoryId && $categoryId !== "All") {
        $query->where('car_category_id', $categoryId);
    }

    // Get total count before pagination
    $totalCars = $query->count();

    // Fetch records with pagination
    $cars = $query->skip($offset)->take(8)->get();

    // Correct hasMore calculation
    $hasMore = ($offset + count($cars)) < $totalCars;

    return response()->json([
        'cars' => view("website.category.include.car-item", compact('cars'))->render(),
        'hasMore' => $hasMore
    ]);
}  
    


}
