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
        $defaultCurrency = Currency::where('is_default', 'Yes')->first();
        $activeCurrencies = Currency::where('is_active','Yes')->get();
        $cars = Car::orderBy('created_at', 'desc')->take(7)->get();
        return view('website.index', compact('cars','defaultCurrency','activeCurrencies'));
    }
}
