<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteHomeController extends Controller
{
    public function showView()
    {
        return view('website.index'); 
    }
}
