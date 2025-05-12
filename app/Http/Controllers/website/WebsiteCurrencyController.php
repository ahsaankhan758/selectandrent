<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class WebsiteCurrencyController extends Controller
{
    public function setDefaultCurreny($id){
        Currency::query()->update(['is_default' => 'No']);
        $currency = Currency::find($id);
        session(['defaultCurrencyCode' => $currency->code ]);
        session(['defaultCurrencyName' => $currency->name ]);
        $currency->is_default = 'Yes';
        $currency->save();
        return redirect('/');
    }
}
