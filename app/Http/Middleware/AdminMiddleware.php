<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check() && in_array($role, ['adminForm', 'userForm'])) {
            return $next($request);
        }

        if (!Auth::check() && $request->has('email')) {
            $current_user = User::where('email', $request->email)->first();

            if (!$current_user || $current_user->status != 1) {
                return redirect()->back()->with('statusDanger', 'Invalid or inactive user.');
            }

            if ($role === $current_user->role) {
                return $next($request);
            }

            switch ($role) {
                case 'admin':
                    return redirect('admin/login')->with('statusDanger', 'Admin Access Only. Invalid User...');
                case 'user':
                    return redirect()->back()->with('statusDanger', 'User Access Only. Invalid User...');
                case 'company':
                    return redirect('company/login')->with('statusDanger', 'Company Access Only. Invalid User...');
            }
        }

        if (Auth::check()) {
            $userRole = Auth::user()->role;

            if (
                ($userRole === 'admin' && in_array($role, ['userForm', 'user', 'company'])) ||
                ($userRole === 'user' && in_array($role, ['adminForm', 'admin', 'company'])) ||
                ($userRole === 'company' && in_array($role, ['admin', 'user']))
            ) {
                abort(401); 
            }
        }

        return $next($request);
    }
}
