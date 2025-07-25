<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        $user = Auth::user();
    
        if ($user->role === 'admin') {
            if ($user->status == 1) {
                // save logs
                $userId = $user->id;
                $userName = $user->name;
                $desciption = $userName.' Logged In. User Role Was '.$user->role;
                $action = 'Logged In';
                $module = 'Admin';
                activityLog($userId, $desciption,$action,$module);
                return 'admin/dashboard';
            } else {
                return 'admin/login';
            }
        }
    
        if ($user->role === 'company') {
            if ($user->status == 1) {
                // save logs
                $userId = $user->id;
                $userName = $user->name;
                $desciption = $userName.' Logged In. User Role Was '.$user->role;
                $action = 'Logged In';
                $module = 'Company';
                activityLog($userId, $desciption,$action,$module);
                return 'company/dashboard';
            } else {
                return 'company/login';
            }
        }

        if ($user->role === 'employee') {
            if ($user->status == 1) {
                // save logs
                $userId = $user->id;
                $userName = $user->name;
                $desciption = $userName.' Logged In. User Role Was '.$user->role;
                $action = 'Logged In';
                $module = 'Employee';
                activityLog($userId, $desciption,$action,$module);
                return 'employee/dashboard';
            } else {
                return 'employee/login';
            }
        }
    
        // Default redirect path if role is not admin or company
        return '/';
    }
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
