<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function setLanguage(Language $lang){
        auth()->user()->update(['language_id' => $lang->id]);
        Session::put('lang',$lang->code);
        return redirect()->back();
    }
}
