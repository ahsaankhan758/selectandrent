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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {   
       if(!Auth::check() && $role == 'adminForm')
            {
                return $next($request);
            }
        elseif(!Auth::check() && $role == 'userForm')
            {   
                return $next($request);
            }
        if(!Auth::check() && $request['email'])
            {
                $current_user = User::where('email', $request['email'])->first();
                if($role == 'admin' && $current_user)
                    {
                        if($current_user->role == 'admin')
                            {   
                                return $next($request);
                            }
                        else 
                            {
                                return redirect('admin/login')->with('statusDanger','Admin Access Only.Invalid User...');
                            }
                    }
                if($role == 'user' && $current_user)
                    {
                        if($current_user->role == 'user')
                            {   
                                return $next($request);
                            }
                        else 
                            {
                                //return $next($request);
                                return redirect('login')->with('statusDanger','User Access Only.Invalid User...');
                            }
                    }
                if($role == 'company' && $current_user)
                    {
                        if($current_user->role == 'company')
                            {   
                                return $next($request);
                            }
                        else 
                            {
                                //return $next($request);
                                return redirect('company/login')->with('statusDanger','Company Access Only.Invalid User...');
                            }
                    }
            }
        if(Auth::check())
            {
                if(Auth::user()->role == 'admin' && $role == 'userForm')
                    abort(401);
                if(Auth::user()->role == 'user' && $role == 'adminForm')
                    abort(401);
                if(Auth::user()->role == 'admin' && $role == 'user')
                    abort(401);
                if(Auth::user()->role == 'admin' && $role == 'company')
                    abort(401);
                if(Auth::user()->role == 'user' && $role == 'admin')
                    abort(401);
                if(Auth::user()->role == 'user' && $role == 'company')
                    abort(401);
                if(Auth::user()->role == 'company' && $role == 'admin')
                    abort(401);
                if(Auth::user()->role == 'company' && $role == 'user')
                    abort(401);                
            }
            
        return $next($request);
    }
}
