<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Currency;


class WebsiteHomeController extends Controller
{
    public function showView()
    {
        $cars = Car::orderBy('created_at', 'desc')->take(7)->get();
        return view('website.index', compact('cars',));
    }
}
