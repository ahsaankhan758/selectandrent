<?php

namespace App\Http\Controllers\Admin\Cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarLocation;
use Auth;

class CarLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = CarLocation::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.cars.carLocations', compact('locations'));
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
            'city'=> 'required|unique:car_locations',
        ]);
        $location = new CarLocation;
        $location->city = $validatedData['city'];
        $location->save();
        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Created [Location Name '.$validatedData['city'].'] Successfully.';
        $action = 'Create';
        $module = 'Location';
        activityLog($userId, $desciption,$action,$module);
        return redirect()->route('carLocations')->with('status','Car Location Ceated Successfully.');
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
        $location = CarLocation::find($id);
        if($location->cars()->exists())
            {
                return redirect()->route('carLocations')-> with('statusDanger','Can Not Delete Location. Please Delete Child Table Entries First To Delete Location');
            }
        $location->delete();
         // save logs
         $userId = Auth::id();
         $userName = Auth::user()->name;
         $desciption = $userName.' Deleted [Location Name '.$location['city'].'] Successfully.';
         $action = 'Delete';
         $module = 'Location';
         activityLog($userId, $desciption,$action,$module);
        return redirect()->route('carLocations')->with('status','Car Location Deleted Successfully.');
    }
}
