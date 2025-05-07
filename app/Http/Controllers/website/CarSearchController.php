<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CarSearchController extends Controller
{
    public function CarSearchView()
{
    $cars = session('searchedCars', []);
    return view('website.carsearch', compact('cars'));
}

}
