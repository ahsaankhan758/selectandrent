<?php

namespace App\Http\Controllers\Admin\Cars;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\CarBrand;


class CarBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = CarBrand::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.cars.carBrands', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:car_brands',
        ]);
        $brand = new CarBrand;
        $brand->name = $validatedData['name'];
        $brand->save();
        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Created [Brand Name '.$validatedData['name'].'] Successfully.';
        $action = 'Create';
        $module = 'Brand';
        activityLog($userId, $desciption,$action,$module);
        return redirect()->route('carBrands')->with('status','Brand Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = CarBrand::find($id);
        if($brand->car_models()->exists())
            {
                return redirect()->route('carBrands')-> with('statusDanger','Can Not Delete Brand. Please Delete Child Table Entries First To Delete Brand');
            }
        $brand->delete();
        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Deleted [Brand Name '.$brand['name'].'] Successfully.';
        $action = 'Delete';
        $module = 'Brand';
        activityLog($userId, $desciption,$action,$module);
        return redirect()->route('carBrands')-> with('status','Brand Data Deleted Successfully.');
    }
}
