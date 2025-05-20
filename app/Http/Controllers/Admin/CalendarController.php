<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\CarCategory;
use App\Models\CarLocation;
use App\Models\CarModel;
use App\Models\Car;
use App\Models\City;
use App\Models\CarFeature;

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
        // $categories = CarCategory::orderBy('name', 'asc')->get();
        // $cities = City::orderBy('name', 'asc')->get();
        // $locations = CarLocation::orderBy('area_name', 'asc')->get();
        // $models = CarModel::orderBy('name', 'asc')->get();
        // $features = CarFeature::orderBy('name')->get();
        return view('admin.calendar.calendar');
        
    }
}
