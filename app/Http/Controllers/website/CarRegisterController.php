<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\company;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompanyApprovedMail;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash; 

class CarRegisterController extends Controller
{
    public function CarRegisterView()
    {
        return view('website.register-car-rental'); 
    }

    public function carRegStore(Request $request)
    {
        // Validate all required fields at once
        $validatedData = $request->validate([
            'name' => 'required',
            'companyName' => 'required|unique:companies,name',
            'email' => 'required|email|unique:users,email',
            'companyEmail' => 'required|email|unique:companies,email',
            'password' => 'required|min:6',
            'phone' => 'required',
            'website' => 'required|url',
        ]);
     

        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        // exit;

        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']); 
        $user->role = 'company';
        $user->save();
    
        $company = new company;
        $company->user_id = $user->id;
        $company->name = $validatedData['companyName'];
        $company->email = $validatedData['companyEmail'];
        $company->phone = $validatedData['phone'];
        $company->website = $validatedData['website'];
        $company->save();
    
        // Save logs
        // $userId = Auth::id();
        // $userName = Auth::user()->name;
    
        // $description = "$userName Created [User Name: {$validatedData['name']}] [User Email: {$validatedData['email']}] Successfully.";
        // activityLog($userId, $description, 'Create', 'User');
        // $description = "$userName Created [Company Name: {$validatedData['companyName']}] [Company Email: {$validatedData['companyEmail']}] Successfully.";
        // activityLog($userId, $description, 'Create', 'Company');
    
        return redirect()->route('website.register')->with('status', 'Company Added Successfully.');
    }
}
