<?php

namespace App\Http\Controllers\website;

use App\Models\Car;

use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\CarLocation;
use App\Models\CarCategory;
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
    'area_name' => 'required|string',
    'Rent' => 'nullable|string',
    'date' => 'nullable|date',
    ], [
    'area_name.required' => 'Location is mandatory.',
    ]);

    $locationIds = [];

    if (!empty($request->area_name)) {
        $locations = CarLocation::with('city')
            ->where(function ($query) use ($request) {
                $query->where('area_name', 'LIKE', '%' . $request->area_name . '%')
                      ->orWhereHas('city', function ($q) use ($request) {
                          $q->where('name', 'LIKE', '%' . $request->area_name . '%');
                      });
            })
            ->get();

        if ($locations->isNotEmpty()) {
            $locationIds = $locations->pluck('id')->toArray();
        }
    }

    // Fetch cars with filters
    $totalCars = 0;
    $cars = Car::with('carModel.car_brands')
        ->where('status', 1)
        ->when(!empty($locationIds), function ($query) use ($locationIds) {
            return $query->whereIn('car_location_id', $locationIds);
        })
        ->when($request->filled('model'), function ($query) use ($request) {
            return $query->where('car_model_id', $request->model);
        })
        ->when($request->filled('brand'), function ($query) use ($request) {
            return $query->whereHas('carModel.car_brands', function ($q) use ($request) {
                $q->where('id', $request->brand);
            });
        })
        ->when($request->filled('transmission'), function ($query) use ($request) {
            return $query->where('transmission', 'LIKE', '%' . $request->transmission . '%');
        })
        ->when($request->filled('Rent'), function ($query) use ($request) {
            [$min, $max] = explode('-', $request->Rent);
            return $query->whereBetween('rent', [(int)$min, (int)$max]);
        })
        ->when($request->filled('date'), function ($query) use ($request) {
            $onlyDate = date('Y-m-d', strtotime($request->date));
            return $query->whereDate('date_added', $onlyDate);
        })
        ->get();

    $totalCars = $cars->count();

    // Store results in session
    session([
        'searchedCars' => $cars,
        'totalCars' => $totalCars
    ]);

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

public function filterCarsHome(Request $request)
{
    $categoryId = $request->car_category_id;

    if (!$categoryId) {
        return response()->json([
            'cars' => '',
            'hasMore' => false
        ]);
    }

    $query = Car::latest()->where('car_category_id', $categoryId);

    $offset = intval($request->offset ?? 0);
    $totalCars = $query->count();
    $cars = $query->skip($offset)->take(6)->get();

    $hasMore = ($offset + count($cars)) < $totalCars;

    return response()->json([
        'cars' => view("website.category.include.car-item", compact('cars'))->render(),
        'hasMore' => $hasMore
    ]);
}



}
