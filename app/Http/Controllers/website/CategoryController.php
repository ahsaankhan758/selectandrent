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
    return view('website.category.categories', compact('categories', 'cars'));
}

public function loadMoreCars(Request $request)
{
    try {
        $offset = intval($request->query('offset', 0)); 

        // Fetch exactly 8 cars (instead of 9)
        $cars = Car::latest()->skip($offset)->take(8)->get();

        // Total count check for Load More condition
        $totalCars = Car::count();
        $hasMore = ($offset + 8) < $totalCars;

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

    $cars = $query->latest()->skip($offset)->take(8)->get();
    $totalCars = $query->count(); 
    $hasMore = ($offset + 8) < $totalCars; 

    return response()->json([
        'cars' => view('website.category.include.carsCategory', compact('cars'))->render(),
        'hasMore' => $hasMore
    ]);
}






    // public function carCategorize(Request $request)
    // {
    //     $categoryId = $request->car_category_id;
    
    //     if ($categoryId === "All") {
    //         $cars = Car::with(['car_categories', 'car_models'])->get();
    //     } else {
    //         $cars = Car::with(['car_categories', 'car_models'])
    //             ->where('car_category_id', $categoryId)
    //             ->get();
    //     }
    
    //     $html = view('website.category.include.carsCategory', compact('cars'))->render();
    
    //     return response()->json(['html' => $html]);
    // }

    // public function carCategorize(Request $request)
    // {
    // $categoryId = $request->car_category_id;

    // if ($categoryId === "All") {
    //     $cars = Car::with(['car_categories', 'car_models'])->get();
    // } else {
    //     $cars = Car::with(['car_categories', 'car_models'])->where('car_category_id', $categoryId)->get();
    // }

    // $cars = $cars->map(function ($car) {
    //     return [
    //         'car_category_id' => $car->car_category_id,
    //         'category' => $car->car_categories ? $car->car_categories->name : 'N/A',
    //         'thumbnail' => $car->thumbnail,
    //         'model' => $car->car_models ? $car->car_models->name : 'N/A', 
    //     ];
    // })->toArray();

    // return response()->json([
    //     'cars' => $cars, 
    // ]);
    // }
 
    

    

    
    
    


}
