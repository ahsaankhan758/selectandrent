<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Car;


class carDetailController extends Controller
{
    public function cardetailView($id)
    {
        $car = Car::findOrFail($id);

        $cars = Car::orderBy('created_at', 'desc')->take(7)->get();

        return view('website.car-detail', compact('car', 'cars'));
    }
}
