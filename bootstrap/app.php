<?php

use App\Http\Middleware\userAuth;
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
    ->withMiddleware(function (Middleware $middleware): void {
        //

        $middleware->appendToGroup('web', StartSession::class);

        // ✅ Then add your custom middleware (so it gets session access)
        $middleware->appendToGroup('web', UserAuth::class);
        // $middleware->alias([

        //      'UserAuth'=>userAuth::class,

        // ]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
