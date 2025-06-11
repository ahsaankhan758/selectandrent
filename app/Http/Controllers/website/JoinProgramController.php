<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JoinProgramController extends Controller
{
    public function joinView(){
        return view('website.Join-our-program');
    }
}
