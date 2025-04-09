<?php

namespace App\Http\Controllers\website;

use Auth;
use App\Models\User;
use App\Models\company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompanyVerificationMail;
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
    
        // Create user
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = 'company';
        $user->save();
    
        // Create company
        $company = new Company;
        $company->user_id = $user->id;
        $company->name = $validatedData['companyName'];
        $company->email = $validatedData['companyEmail'];
        $company->phone = $validatedData['phone'];
        $company->website = $validatedData['website'];
        $company->save();
    
        try {
            Mail::to($user->email)->send(new CompanyVerificationMail($user));
        } catch (\Exception $e) {
            return back()->with('error', 'Mail not sent: ' . $e->getMessage());
        }
        
        return redirect()->route('website.register')->with('status', 'Company And User Added Successfully.');
    }
    
}
