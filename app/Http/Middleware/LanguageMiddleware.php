<?php
namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;



class LanguageMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $languages = Language::all(); 
        $defaultLang = Language::where('is_default', 'yes')->first();
        $userDefaultLang = null;

        if (auth()->check() && !empty(auth()->user()->language_id)) {
            $userDefaultLang = Language::find(auth()->user()->language_id);
        }
        
        if (!auth()->check()) {
            App::setLocale($request->session()->get('lang', $defaultLang->code));
        } elseif ($userDefaultLang) {
            App::setLocale($userDefaultLang->code);
        } else {
            // Fallback in case user has no language_id
            App::setLocale($defaultLang->code);
        }
       

        View::share(compact('languages', 'defaultLang', 'userDefaultLang'));

        return $next($request);
    }
}
