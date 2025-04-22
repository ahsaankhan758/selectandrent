<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegister;
use App\Mail\UserActivatedEmail;
use Illuminate\Support\Str;


class SignupController extends Controller
{
    public function signup(Request $request)
        {
            // Validate the request
            $request->validate([
                'name' => 'required',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|same:password_confirmation',
                'password_confirmation' => 'min:8',
            ]);
            $token = Str::random(64); 
            // Create the user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user',
                'status' => 0,
                'confirmation_token' => $token,
            ]);
            Mail::to($user->email)->send(new UserRegister($user));
            return response()->json([
                'status' => 'Success',
                'message' => 'Registration successful!',
            ]);

        }
        

public function confirm($token)
{
    $user = User::where('confirmation_token', $token)->first();

    if (!$user) {
        return response()->json([
            'status' => 'Error',
            'message' => 'Email Already Confirmed.',
        ], 404);
    }

    // Check if already confirmed
    if ($user->status == 1) {
        return response()->json([
            
        ]);
    }

    $user->update([
        'status' => 1,
        'confirmation_token' => null,
    ]);
    
    Mail::to($user->email)->send(new UserActivatedEmail($user));
    return redirect('/');


    // return response()->json([
    //     'status' => 'Success',
    //     'message' => 'Email confirmed successfully. You can now log in.',
    // ]);
}

}
