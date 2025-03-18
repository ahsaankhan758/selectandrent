<?php

namespace App\Http\Controllers\Admin\Cars;

use App\Http\Controllers\Controller;
use App\Models\CarCategory;
use App\Models\CarLocation;
use App\Models\CarModel;
use Illuminate\Http\Request;
use App\Models\Car;
use Auth;
use App\Models\CarFeature;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::orderBy('created_at', 'desc')->paginate('20');
        return view('admin.cars.carsListing.carsListing',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CarCategory::orderBy('name', 'asc')->get();
        $locations = CarLocation::orderBy('city', 'asc')->get();
        $models = CarModel::orderBy('name', 'asc')->get();
        $features = CarFeature::orderBy('name')->get();
        return view('admin.cars.carsListing.create',compact('categories','locations','models','features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
        'model'=> 'required',
        'category' => 'required',
        'year' => 'required',
        'location' => 'required',
        'beam' => 'required',
        'transmission' => 'required',
        'seats' => 'required',
        'weight' => 'required',
        'doors' => 'required',
        'mileage' => 'required',
        'engine_size' => 'required',
        'luggage' => 'required',
        'drive' => 'required',
        'fuel_economy' => 'required',
        'fuel_type' => 'required',
        'exterior_color' => 'required',
        'interior_color' => 'required',
        'lisence_plate' => 'required|unique:cars',
        'rent' => 'required',
        'detail' => 'required',
       ]);
       $car = new Car;
       $car->car_model_id = $validatedData['model'];
       $car->car_category_id = $validatedData['category'];
       $car->car_location_id = $validatedData['location'];
       $car->year = $validatedData['year'];
       $car->beam = $validatedData['beam'];
       $car->seats = $validatedData['seats'];
       $car->transmission = $validatedData['transmission'];
       $car->weight = $validatedData['weight'];
       $car->doors = $validatedData['doors'];
       $car->mileage = $validatedData['mileage'];
       $car->engine_size = $validatedData['engine_size'];
       $car->luggage = $validatedData['luggage'];
       $car->drive = $validatedData['drive'];
       $car->fuel_economy = $validatedData['fuel_economy'];
       $car->fuel_type = $validatedData['fuel_type'];
       $car->exterior_color = $validatedData['exterior_color'];
       $car->interior_color = $validatedData['interior_color'];
       $car->lisence_plate = $validatedData['lisence_plate'];
       $car->rent = $validatedData['rent'];
       $car->detail = $validatedData['detail'];
       if($request->hasFile('thumbnail'))
                {
                    $car->thumbnail = $request->file('thumbnail')->store('carThumbnail','public');
                }
        if($request->hasFile('images'))
            {
                foreach ($request->file('images') as $imageFile) {
                    $imagePaths[] = $imageFile->store('carImages', 'public');
                }
                $car->images = serialize($imagePaths) ;   
            }     
       $car->features = serialize($request['features']);     
       $car->save();
       // save logs
       $userId = Auth::id();
       $userName = Auth::user()->name;
       $desciption = $userName.' Created [ Car Lisence Plate '.$car->lisence_plate.'] [Car Name '.$car->car_models->name.'] Successfully.';
       $action = 'Create';
       $module = 'Car';
       activityLog($userId, $desciption,$action,$module);
       return redirect()->route('carListings')->with('status','Car Created Successfully.');
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
        $car = Car::find($id);
        $categories = CarCategory::orderBy('name', 'asc')->get();
        $locations = CarLocation::orderBy('city', 'asc')->get();
        $models = CarModel::orderBy('name', 'asc')->get();
        $features = CarFeature::orderBy('name')->get();
        return view('admin.cars.carsListing.edit',compact('car','categories','locations','models','features'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'model'=> 'required',
            'category' => 'required',
            'year' => 'required',
            'location' => 'required',
            'beam' => 'required',
            'transmission' => 'required',
            'seats' => 'required',
            'weight' => 'required',
            'doors' => 'required',
            'mileage' => 'required',
            'engine_size' => 'required',
            'luggage' => 'required',
            'drive' => 'required',
            'fuel_economy' => 'required',
            'fuel_type' => 'required',
            'exterior_color' => 'required',
            'interior_color' => 'required',
            'lisence_plate' => 'required',
            'rent' => 'required',
            'detail' => 'required',
           ]);
           $car = Car::find($id);
           $car->car_model_id = $validatedData['model'];
           $car->year = $validatedData['year'];
           $car->car_category_id = $validatedData['category'];
           $car->car_location_id = $validatedData['location'];
           $car->beam = $validatedData['beam'];
           $car->seats = $validatedData['seats'];
           $car->transmission = $validatedData['transmission'];
           $car->weight = $validatedData['weight'];
           $car->doors = $validatedData['doors'];
           $car->mileage = $validatedData['mileage'];
           $car->engine_size = $validatedData['engine_size'];
           $car->luggage = $validatedData['luggage'];
           $car->drive = $validatedData['drive'];
           $car->fuel_economy = $validatedData['fuel_economy'];
           $car->fuel_type = $validatedData['fuel_type'];
           $car->exterior_color = $validatedData['exterior_color'];
           $car->interior_color = $validatedData['interior_color'];
           $car->lisence_plate = $validatedData['lisence_plate'];
           $car->rent = $validatedData['rent'];
           $car->detail = $validatedData['detail'];
           if($request->hasFile('thumbnail'))
                {
                    if(!empty($car->thumbnail))
                        {
                            $old_thumbnail = storage_path('app/public/' . $car->thumbnail);
                            unlink($old_thumbnail);
                        }
                    $car->thumbnail = $request->file('thumbnail')->store('carThumbnail','public');
                }
            // Store each image and save the path
            if($request->hasFile('images'))
                {
                    if(!empty($car->images))
                        {   
                            foreach( unserialize($car->images) as $image)
                                {
                                    $old_image = storage_path('app/public/' . $image);
                                    unlink($old_image);
                                }
                        }
                    foreach ($request->file('images') as $imageFile) {
                        $imagePaths[] = $imageFile->store('carImages', 'public');
                    }
                    $car->images = serialize($imagePaths);   
                }
        if(empty($request['features']))
            $car->features = null;
        else
            $car->features = serialize($request['features']);        
        $car->update();
        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Updated [ Car Lisence Plate '.$car->lisence_plate.'] [Car Name '.$car->car_models->name.'] Successfully.';
        $action = 'Update';
        $module = 'Car';
        activityLog($userId, $desciption,$action,$module);
        return redirect()->route('carListings')->with('status','Car Updated Successfully.');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::find($id);

        //$filePath = storage_path('app/public/' . $old_thumbnail);

            // if (file_exists($filePath)) {
            //     unlink($filePath);
            // } else {
            //     // Handle the case where the file doesn't exist
            //     echo "File not found!";
            // }

        if(!empty($car->thumbnail))
        {
            $old_thumbnail = storage_path('app/public/' . $car->thumbnail);
            unlink($old_thumbnail);
        }
        //Unlink Images
    if(!empty($car->images))
    {   
        foreach(unserialize($car->images) as $image)
            {
                $old_image = storage_path('app/public/' . $image);
                unlink($old_image);
            }
    }
        $car->delete();
         // save logs
         $userId = Auth::id();
         $userName = Auth::user()->name;
         $desciption = $userName.' Deleted [ Car Lisence Plate '.$car->lisence_plate.'] [Car Name '.$car->car_models->name.'] Successfully.';
         $action = 'Delete';
         $module = 'Car';
         activityLog($userId, $desciption,$action,$module);
        return redirect()->route('carListings')->with('status','Car Deleted Successfully.');
    }
}
