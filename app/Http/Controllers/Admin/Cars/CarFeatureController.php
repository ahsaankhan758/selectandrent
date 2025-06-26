<?php

namespace App\Http\Controllers\Admin\Cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarFeature;
use Auth;

class CarFeatureController extends Controller
{
    public function index()
        {
            $features = CarFeature::orderBy('created_at', 'desc')->paginate(10);
            return view('admin.cars.carFeatures', compact('features'));
        }
     public function store(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required|unique:car_features',
            ]);
            $features = new CarFeature;
            $features->name = $validatedData['name'];
            $features->save();
            // save logs
            $userId = Auth::id();
            $userName = Auth::user()->name;
            $desciption = $userName.' Created [Feature Name '.$validatedData['name'].'] Successfully.';
            $action = 'Create';
            $module = 'Feature';
            activityLog($userId, $desciption,$action,$module);
            return redirect()->route('carFeatures')->with('status','Feature Created Successfully.');
        }
        public function destroy(string $id)
            {
                $features = CarFeature::find($id);
                $features->delete();
                // save logs
                $userId = Auth::id();
                $userName = Auth::user()->name;
                $desciption = $userName.' Deleted [Feature Name '.$features['name'].'] Successfully.';
                $action = 'Delete';
                $module = 'Feature';
                activityLog($userId, $desciption,$action,$module);
                return redirect()->route('carFeatures')-> with('status','Feature Data Deleted Successfully.');
            }
}
