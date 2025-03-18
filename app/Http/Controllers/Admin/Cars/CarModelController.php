<?php

namespace App\Http\Controllers\Admin\Cars;

use App\Http\Controllers\Controller;
use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Auth;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = CarModel::orderBy('created_at', 'desc')->paginate(20);
        $brands = CarBrand::orderBy('name', 'asc')->get();
        return view('admin.cars.carModels', compact('models','brands'));
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
            'name'=> 'required|unique:car_models',
            'car_brand_id'=>'required',
        ]);
        $model = new CarModel;
        $model->name = $validatedData['name'];
        $model->car_brand_id = $validatedData['car_brand_id'];
        $model->save();
         // save logs
         $userId = Auth::id();
         $userName = Auth::user()->name;
         $desciption = $userName.' Created [Model Name '.$validatedData['name'].'] Successfully.';
         $action = 'Create';
         $module = 'Model';
         activityLog($userId, $desciption,$action,$module);
        return redirect()->route('carModels')->with('status','Car Model Created Successfully.');
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
        $model = CarModel::find($id);
        if($model->cars()->exists())
            {
                return redirect()->route('carModels')-> with('statusDanger','Can Not Delete Model. Please Delete Child Table Entries First To Delete Model');
            }
        $model->delete();
        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Deleted [Model Name '.$model['name'].'] Successfully.';
        $action = 'Delete';
        $module = 'Model';
        activityLog($userId, $desciption,$action,$module);
        return redirect()->route('carModels')->with('status','Car Model Deleted Successfully.');
    }
    
}
