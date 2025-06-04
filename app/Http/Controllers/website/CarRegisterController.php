<?php

namespace App\Http\Controllers\website;

use Auth;
use App\Models\User;
use App\Models\company;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompanyVerificationMail;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CarRegisterController extends Controller
{
    public function CarRegisterView()
    {

        $countries = Country::where('status', 1)->orderBy('name')->get();
        return view('website.register-with-car-rental', compact('countries'));  

    }

    public function carRegStore(Request $request)
    {

        
        $validatedData = $request->validate([
            'name' => 'required',
            'companyName' => 'required|unique:companies,name',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->where(function ($query) use ($request) {
                    return $query->where('role', 'company');
                }),
            ],

            'companyEmail' => 'required|email|unique:companies,email',
            'password' => 'required|min:6',
            'phone' => 'required',
            'website' => 'required',

            'country_id' => 'required|exists:countries,id',
        ]);

        DB::beginTransaction();

        try {
            $user = new User;
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->password = Hash::make($validatedData['password']);
            $user->role = 'company';
            $user->save();

            $company = new Company;
            $company->user_id = $user->id;
            $company->name = $validatedData['companyName'];
            $company->email = $validatedData['companyEmail'];
            $company->phone = $validatedData['phone'];
            $company->website = $validatedData['website'];
            $company->country_id = $validatedData['country_id'];
            $company->save();

            $adminId = User::where('role', 'admin')->value('id');

            if ($adminId) {
                $message = 'A new company (' . $company->name . ') has registered and is awaiting your approval.';
                saveNotification(4, $user->id, $adminId, $adminId, $message);
            }

            Mail::to($user->email)->queue(new CompanyVerificationMail($user));
            
            $adminId = User::where('role', 'admin')->value('id');
            if ($adminId) {
                $notificationType = 4; 
                $fromUserId = $user->id;
                $toUserId = $adminId;
                $userId = $adminId;
                $message = 'A new company (' . $company->name . ') has registered and is awaiting your approval.';
                saveNotification($notificationType, $fromUserId, $toUserId, $userId, $message);
            }
            DB::commit();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Company registered successfully. Awaiting admin approval.'
            ]);
    }
            return redirect()->route('website.register')->with('status', 'Company registered successfully. Awaiting admin approval.');
        } catch (\Exception $e) {
            DB::rollBack();

            if ($request->ajax()) {
                return response()->json(['message' => 'An error occurred: ' . $e->getMessage()]);
            }
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

}
