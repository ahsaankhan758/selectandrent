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
        $userDefaultLang = auth()->check() ? Language::find(auth()->user()->language_id) : $defaultLang;

        if ($request->session()->has('lang')) {
            App::setLocale($request->session()->get('lang'));
        } elseif ($userDefaultLang) {
            App::setLocale($userDefaultLang->code); 
        }

        View::share(compact('languages', 'defaultLang', 'userDefaultLang'));

        return $next($request);
    }
}
