<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use Auth;

class CurrencyController extends Controller
{
    public function index(){
        $currencies = Currency::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.currencies.index', compact('currencies'));
    }
    public function create(){
        return view('admin.currencies.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:currencies,name',
            'code' => 'required|unique:currencies,code',
            'rate' => 'required',
            'decimals' => 'required',
            'symbol_placement' => 'required',
            // 'is_default' => 'required',
            'is_active' => 'required',
        ]);
        $currency = new Currency;
        $currency->name = $validatedData['name'];
        $currency->symbol = $request->symbol;
        $currency->code = $request->code;
        $currency->rate = $validatedData['rate'];
        $currency->decimals = $validatedData['decimals'];
        $currency->primary_order = $request->primary_order;
        $currency->symbol_placement = $validatedData['symbol_placement'];
        // $currency->is_default = $validatedData['is_default'];
        $currency->is_active = $validatedData['is_active'];
        $currency->save();
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Created [ Currency '.$validatedData['name'].'] Successfully.';
        $action = 'Create';
        $module = 'Currency';
        activityLog($userId, $desciption,$action,$module);
        return redirect ()->route('currencies')->with('status','Currency Created Successfully.');
    }
    public function edit($id){
        $currency = Currency::find($id);
        return view('admin.currencies.edit', compact('currency'));
    }
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:currencies,name,' . $id,
            'code' => 'required|unique:currencies,code,' . $id,
            'rate' => 'required',
            'decimals' => 'required',
            'symbol_placement' => 'required',
            //'is_default' => 'required',
            'is_active' => 'required',
        ]);
        $currency = Currency::find($id);
        $currency->name = $validatedData['name'];
        $currency->symbol = $request->symbol;
        $currency->code = $request->code;
        $currency->rate = $validatedData['rate'];
        $currency->decimals = $validatedData['decimals'];
        $currency->primary_order = $request->primary_order;
        $currency->symbol_placement = $validatedData['symbol_placement'];
        //$currency->is_default = $validatedData['is_default'];
        $currency->is_active = $validatedData['is_active'];
        $currency->update();
        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Updated [ Currency '.$validatedData['name'].'] Successfully.';
        $action = 'Update';
        $module = 'Currency';
        activityLog($userId, $desciption,$action,$module);
        return redirect()->route('currencies')->with('status', 'Currency Record Updated Successfully.');
    }
    public function delete(string $id)
    {
        $currency = Currency::find($id);
        $currency->delete();
         // save logs
         $userId = Auth::id();
         $userName = Auth::user()->name;
         $desciption = $userName.' Deleted [ Currency '.$currency->name.'] Successfully.';
         $action = 'Delete';
         $module = 'Currency';
         activityLog($userId, $desciption,$action,$module);
        return redirect()->route('currencies')-> with('statusDanger','Currency Data Deleted Successfully.');
    }
}
