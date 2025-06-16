<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\CarCategory;
use App\Models\CarLocation;
use App\Models\CarModel;
use App\Models\Car;
use App\Models\City;
use App\Models\CarFeature;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class CalendarController extends Controller
{
    public function index()
    {
        // $events = Event::all()->map(function ($booking) {
        //     return [
        //         'title' => $booking->title,
        //         'category' => $booking->category,
        //         'start' => $booking->start,
        //         'end' => $booking->end,
        //     ];
        // });
        $categories = CarCategory::orderBy('name', 'asc')->get();
        $cities = City::orderBy('name', 'asc')->get();
        $locations = CarLocation::orderBy('area_name', 'asc')->get();
        $models = CarModel::orderBy('name', 'asc')->get();
        $features = CarFeature::orderBy('name')->get();
        return view('admin.calendar.calendar', compact('categories','cities','locations','models','features',));
        
    }
     public function getVehicles()
    {
        $query = Car::where('upload_type', 'calendar');

        if (Auth::user()->role === 'company') {
            $query->where('user_id', Auth::id());
        }

        $vehicles = $query->get()->map(function ($vehicle) {
            return [
                'title' => $vehicle->lisence_plate,
                'className' => 'bg-success',
                'start' => Carbon::parse($vehicle->date_added)->toIso8601String(),
                'end' => Carbon::parse($vehicle->date_added)->toIso8601String(),
                'extendedProps' => [
                    'vehicle_id' => $vehicle->id,
                    'model' => $vehicle->car_model_id,
                    'category' => $vehicle->car_category_id,
                    'city' => $vehicle->car_locations->city_id,
                    'location' => $vehicle->car_location_id,
                    'fuel_type' => $vehicle->fuel_type,
                    'transmission' => $vehicle->transmission,
                    'drive' => $vehicle->drive,
                    'weight' => $vehicle->weight,
                    'doors' => $vehicle->doors,
                    'year' => $vehicle->year,
                    'engine_size' => $vehicle->engine_size,
                    'luggage' => $vehicle->luggage,
                    'seats' => $vehicle->seats,
                    'fuel_economy' => $vehicle->fuel_economy,
                    'exterior_color' => $vehicle->exterior_color,
                    'interior_color' => $vehicle->interior_color,
                    'rent' => $vehicle->rent,
                    'mileage' => $vehicle->mileage,
                    'detail' => $vehicle->detail,
                    'status' => $vehicle->status,
                    "thumbnail" => $vehicle->thumbnail,
                    'images' => is_string($vehicle->images) 
                        ? @unserialize($vehicle->images) ?: [] 
                        : (is_array($vehicle->images) ? $vehicle->images : []),

                    'features' => is_string($vehicle->features) 
                        ? @unserialize($vehicle->features) ?: [] 
                        : (is_array($vehicle->features) ? $vehicle->features : []),
                ],
            ];
        });

return response()->json($vehicles);

    }
       public function store(Request $request)
        {

            $validator = Validator::make($request->all(), [
                'lisence_plate' => 'required|unique:cars',
                'start' => 'required',
                'car_model_id' => 'required',
                'car_category_id' => 'required',
                'car_location_id' => 'required',
                'fuel_type' => 'required',
                'transmission' => 'required',
                'drive' => 'required',
                'weight' => 'required',
                'doors' => 'required',
                'year' => 'required',
                'engine_size' => 'required',
                'luggage' => 'required',
                'seats' => 'required',
                'fuel_economy' => 'required',
                'exterior_color' => 'required',
                'interior_color' => 'required',
                'rent' => 'required',
                'mileage' => 'required',
                'detail' => 'required',
                
            ]);

            $features = $request->input('features');
            $serializedFeatures = serialize($features);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                    'status' => 'error'
                ]);
            }
            
            $validated = $validator->validated();
            $vehicle = new Car($validated);
            $user = Auth::user();
            if ($user && ($user->role == 'admin' || $user->role == 'company')) {
                $vehicle->user_id = $user->id;
            }
            else{
                $owner = EmployeeOwner($user->id);
                $vehicle->user_id = $owner->id;
            }
            $vehicle->date_added = $request->start;
            $vehicle->upload_type = 'calendar';

            if($request->hasFile('thumbnail'))
                {
                    $vehicle->thumbnail = $request->file('thumbnail')->store('carThumbnail','public');
                }
            if($request->hasFile('images'))
                {
                    foreach ($request->file('images') as $imageFile) {
                        $imagePaths[] = $imageFile->store('carImages', 'public');
                    }
                    $vehicle->images = serialize($imagePaths) ;   
                }     

            $vehicle->features = $serializedFeatures;
            $vehicle->save();

            // save logs
            $userId = Auth::id();
            $userName = Auth::user()->name;
            $desciption = $userName.' Created [ Vehicle License Plate: '.$validated['lisence_plate'].'] [Vehicle Name: '.$vehicle->car_models->name.'] Successfully.';
            $action = 'Create';
            $module = 'Vehicle [Calendar]';
            activityLog($userId, $desciption,$action,$module);
            return response()->json([
                'message' => 'Vehicle Created successfully',
                'licensePlate' => $validated['lisence_plate'],
                'city' => $request->city,
                'status' => 'success',
            ]);
        }
    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'lisence_plate' => 'required|unique:cars,lisence_plate,' . $request->vehicle_id,
            'car_model_id' => 'required',
            'car_category_id' => 'required',
            'city' => 'required',
            'car_location_id' => 'required',
            'fuel_type' => 'required',
            'transmission' => 'required',
            'drive' => 'required',
            'weight' => 'required',
            'doors' => 'required',
            'year' => 'required',
            'engine_size' => 'required',
            'luggage' => 'required',
            'seats' => 'required',
            'fuel_economy' => 'required',
            'exterior_color' => 'required',
            'interior_color' => 'required',
            'rent' => 'required',
            'mileage' => 'required',
            'detail' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' => 'error'
            ]);
        }

        $validated = $validator->validated();

        $selectedVehicle = Car::find($request->vehicle_id);
        
        if ($request->hasFile('thumbnail')) {
            if (!empty($selectedVehicle->thumbnail)) {
                $old_thumbnail = storage_path('app/public/' . $selectedVehicle->thumbnail);
                if (file_exists($old_thumbnail)) {
                    unlink($old_thumbnail);
                }
            }

            $selectedVehicle->thumbnail = $request->file('thumbnail')->store('carThumbnail', 'public');
            
        }

        if($request->hasFile('images'))
                {
                    if(!empty($selectedVehicle->images))
                        {   
                            foreach( unserialize($selectedVehicle->images) as $image)
                                {
                                    $old_image = storage_path('app/public/' . $image);
                                    if(file_exists($old_image)){
                                        unlink($old_image);
                                    }
                                }
                        }
                    foreach ($request->file('images') as $imageFile) {
                        $imagePaths[] = $imageFile->store('carImages', 'public');
                    }
                    $selectedVehicle->images = serialize($imagePaths);   
                }

        $features = $request->input('features');
        $serializedFeatures = serialize($features);
        $selectedVehicle->features = $serializedFeatures;
        $selectedVehicle->update($validated);
        
        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Updated [ Vehicle License Plate: '.$selectedVehicle->lisence_plate.'] [Vehicle Name: '.$selectedVehicle->car_models->name.'] Successfully.';
        $action = 'Update';
        $module = 'Vehicle [Calendar]';
        activityLog($userId, $desciption,$action,$module);
        return response()->json([
            'message' => 'Vehicle Updated Successfully',
            'status' => 'success',
            'thumbnailProp' => $selectedVehicle->thumbnail
        ]);
    }
    public function delete(Request $request){
        $validated =  $request->validate([
            'vehicle_id' => 'required'
        ]);
        $vehical = Car::find($validated['vehicle_id']);
        if(!empty($vehical->thumbnail))
        {
            $old_thumbnail = storage_path('app/public/' . $vehical->thumbnail);
            if (file_exists($old_thumbnail)) {
                unlink($old_thumbnail);
            }
        }
        //Unlink Images
        if(!empty($vehical->images))
        {   
            foreach(unserialize($vehical->images) as $image)
                {
                    $old_image = storage_path('app/public/' . $image);
                    if (file_exists($old_image)) {
                        unlink($old_image);
                    }
                }
        }
        $vehical->delete();

        // save logs
         $userId = Auth::id();
         $userName = Auth::user()->name;
         $desciption = $userName.' Deleted [ Vehicle License Plate: '.$vehical->lisence_plate.'] [Vehicle Name: '.$vehical->car_models->name.'] Successfully.';
         $action = 'Delete';
         $module = 'Vehicle [Calendar]';
         activityLog($userId, $desciption,$action,$module);
        return response()->json([
            'message' => 'Event Deleted Successfully',
        ]);
    }


    public function updateEventDate(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:cars,id',
            'new_start' => 'required|date',
        ]);

        $vehicle = Car::find($request->vehicle_id);
         $vehicle->date_added = date('Y-m-d H:i:s', strtotime($request->new_start));
        $vehicle->save();

        return response()->json(['status' => 'success']);
    }

}