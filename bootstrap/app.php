<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\CompanyAuth;
use App\Http\Middleware\IP_Check_Middleware;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\LanguageMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\Middleware\StartSession;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('LanguageMiddleware',LanguageMiddleware::class);
        $middleware->alias([
            'IsAdmin' =>AdminMiddleware::class,
            'IsUser' =>UserMiddleware::class,
            'IPCheck' =>IP_Check_Middleware::class,
            'CompanyAuth' => CompanyAuth::class,  
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
   


