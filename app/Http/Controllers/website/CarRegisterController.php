<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarRegisterController extends Controller
{
    public function CarRegisterView()
    {
        return view('website.register-car-rental'); 
    }
}
