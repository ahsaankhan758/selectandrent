<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarSearchController extends Controller
{
    public function CarSearchView()
    {
        return view('website.carsearch'); 
    }
}
