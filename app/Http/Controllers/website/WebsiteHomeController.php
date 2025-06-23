<?php

namespace App\Http\Controllers\website;

use App\Models\Car;

use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\CarLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class WebsiteHomeController extends Controller
{
    public function showView()
    {
        $cars = Car::where('status',1)
        ->orderBy('created_at', 'desc')->take(10)->get();
        $featuredVehicle = Car::where('status',1)
        ->where('is_featured', '1')->take(10)->get();
        $newArrival = Car::where('status',1)
        ->orderBy('created_at', 'desc')->take(10)->get();
        return view('website.index', compact('cars','featuredVehicle','newArrival'));
    }

public function search(Request $request)
{
    $request->validate([
    'brand' => 'nullable|numeric',
    'model' => 'nullable|numeric',
    'transmission' => 'nullable|string',
    'location_id' => 'required|numeric',
    'Rent' => 'nullable|string',
    'date' => 'nullable|date',
], [
    'location_id.required' => 'Location is mandatory.',
]);


    $cars = Car::with('carModel.car_brands')
        ->where('status', 1)
        ->where('is_booked', '0')
        ->where('car_location_id', $request->location_id) 
        ->when($request->model, function ($query, $model) {
            return $query->where('car_model_id', $model);
        })
        ->when($request->brand, function ($query, $brand) {
            return $query->whereHas('carModel.car_brands', function ($q) use ($brand) {
                $q->where('id', $brand);
            });
        })
        ->when($request->transmission, function ($query, $transmission) {
            return $query->where('transmission', 'like', "%$transmission%");
        })
        ->when($request->Rent, function ($query, $rentRange) {
            [$min, $max] = explode('-', $rentRange);
            return $query->whereBetween('rent', [(int)$min, (int)$max]);
        })
        ->when($request->date, function ($query, $date) {
            $onlyDate = date('Y-m-d', strtotime($date));
            return $query->whereDate('date_added', '=', $onlyDate);
        })
        ->get();

    $totalCars = $cars->count();

    session(['searchedCars' => $cars, 'totalCars' => $totalCars]);

    return response()->json([
        'status' => true,
        'filteredCount' => $totalCars,
        'message' => 'Cars fetched successfully.',
        'redirect_url' => route('website.carsearch')
    ]);
}






    public function getCarBrands(Request $request)
    {
        $brands = CarBrand::all();
        $transmissions = Car::where('status',1)->distinct()->pluck('transmission');
        if ($request->has('brand_id')) {
            $models = CarModel::where('car_brand_id', $request->brand_id)->get();
        } else {
            $models = CarModel::all();
        }
    
        return response()->json([
            'status' => true,
            'brands' => $brands,
            'models' => $models,
            'transmissions' => $transmissions 
        ]);
    }

public function getLocations()
{
    $locations = CarLocation::select('id', 'area_name')->get();

    return response()->json([
        'status' => true,
        'locations' => $locations
    ]);
}


}
