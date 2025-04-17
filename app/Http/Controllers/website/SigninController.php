<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SigninController extends Controller
{
    public function signin(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt login
        $userRole = $request->user_role; // Fetched From Middleware
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]) && $userRole == 'user') {
            // Regenerate session to prevent fixation
            $request->session()->regenerate();
            
            $html = view('website.template.include')->render();
            // Save Activity Log
            $userId = Auth::id();
            $desciption = Auth::user()->name.' LoggedIn. User Role Is '.$userRole;
            $action = 'LoggedIn';
            $module = 'Website';
            activityLog($userId, $desciption,$action,$module);

            return response()->json([
                'status' => 'Success',
                'message' => 'Login successful!',
                'html' => $html,
            ]);
        }
        elseif($userRole == '')
            {
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Invalid credentials.',
                ]); 
            }

        // Failed login response
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
}
