<?php


use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'medecin'=>\App\Http\Middleware\MedecinMiddleware::class,
            'checkRole' => \App\Http\Middleware\CheckRoleParameter::class,
            'StorePreviousUrl'=> \App\Http\Middleware\StorePreviousUrl::class,


        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create()
    ;