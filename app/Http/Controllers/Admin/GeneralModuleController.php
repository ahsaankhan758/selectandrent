<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GeneralModule;

class GeneralModuleController extends Controller
{

    public function create()
    {
    $userId = Auth::id();
    $module = GeneralModule::where('user_id', $userId)->first();
    return view('admin.general_module.general', compact('module'));
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'commissions' => 'required|numeric',
        'tax'         => 'required|numeric',
    ]);

    $userId = Auth::id();

    $data = [
        'commissions'   => $validated['commissions'],
        'tax'           => $validated['tax'],
        'user_id'       => $userId,
        'module_status' => 1, 
    ];
    $module = GeneralModule::where('user_id', $userId)->first();

    if ($module) {
        $module->update($data);
        $message = 'General Module updated successfully!';

        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Updated General Module Successfully.';
        $action = 'Update';
        $module = 'General Module';
        activityLog($userId, $desciption,$action,$module);
    } else {
        GeneralModule::create($data);
        $message = 'General Module created successfully!';

        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Created General Module Successfully.';
        $action = 'Create';
        $module = 'General Module';
        activityLog($userId, $desciption,$action,$module);

    }

    return redirect()->back()->with('success', $message);
}
}
