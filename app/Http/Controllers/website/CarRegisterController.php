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
use Illuminate\Support\Facades\DB;


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
            'website' => 'required',
        ]);

        DB::beginTransaction();

        try {
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

            // Send notification to admin
            $adminId = User::where('role', 'admin')->value('id');

            if ($adminId) {
                $notificationType = 4; // company registration
                $fromUserId = $user->id;
                $toUserId = $adminId;
                $userId = $adminId;
                $message = 'A new company (' . $company->name . ') has registered and is awaiting your approval.';

                saveNotification($notificationType, $fromUserId, $toUserId, $userId, $message);
            }

            // Send verification mail
            Mail::to($user->email)->queue(new CompanyVerificationMail($user));

            DB::commit();

            return redirect()->route('website.register')->with('status', 'Company and user registered successfully. Awaiting admin approval.');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    
}
