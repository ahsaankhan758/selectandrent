<?php

namespace App\Http\Controllers\website;

use App\Models\Car;

use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
<<<<<<< HEAD
use Illuminate\Support\Facades\Session;
=======
use App\Models\Currency;


>>>>>>> 1c55756bb7f5d206e19c35fda2c93eb23791f9fe

class WebsiteHomeController extends Controller
{
    public function showView()
    {
        $cars = Car::orderBy('created_at', 'desc')->take(7)->get();
        return view('website.index', compact('cars',));
    }

    public function search(Request $request)
    {
        $request->validate([
            'brand' => 'nullable|numeric',
            'model' => 'nullable|numeric',
            'beam' => 'nullable|string',
            'transmission' => 'nullable|string',
            // 'radius' => 'nullable|numeric',
            'minimum' => 'nullable|numeric',
            'maximum' => 'nullable|numeric',
            'year' => 'nullable|numeric',
        ]);
    
        $cars = Car::with('carModel.car_brands')
            ->when($request->model, function ($query, $model) {
                return $query->where('car_model_id', $model);
            })
            ->when($request->brand, function ($query, $brand) {
                return $query->whereHas('carModel.car_brands', function ($q) use ($brand) {
                    $q->where('id', $brand);
                });
            })
            ->when($request->beam, function ($query, $beam) {
                return $query->where('beam', 'like', "%$beam%");
            })
            ->when($request->transmission, function ($query, $transmission) {
                return $query->where('transmission', 'like', "%$transmission%");
            })
            // ->when($request->radius, function ($query, $radius) {
            //     return $query->where('radius', $radius);
            // })
            ->when($request->year, function ($query, $year) {
                return $query->where('year', $year);
            })
            ->when($request->filled('minimum') && $request->filled('maximum'), function ($query) use ($request) {
                return $query->where(DB::raw('CAST(mileage AS UNSIGNED)'), '>=', $request->minimum)
                             ->where(DB::raw('CAST(mileage AS UNSIGNED)'), '<=', $request->maximum);
            })          
            ->get();
    
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Cars fetched successfully.',
        //     'data' => $cars,
        // ]);
        session(['searchedCars' => $cars]);

        return response()->json([
            'status' => true,
            'redirect_url' => route('website.carsearch')
        ]);
    }

    public function getCarBrands(Request $request)
    {
        $brands = CarBrand::all();
        $beams = Car::distinct()->pluck('beam');
        $transmissions = Car::distinct()->pluck('transmission');
        if ($request->has('brand_id')) {
            $models = CarModel::where('car_brand_id', $request->brand_id)->get();
        } else {
            $models = CarModel::all();
        }
    
        return response()->json([
            'status' => true,
            'brands' => $brands,
            'models' => $models,
            'beams' => $beams,
            'transmissions' => $transmissions 
        ]);
    }
    
    




}
