<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;



require __DIR__.'/../vendor/autoload.php';

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
           'admin' => \App\Http\Middleware\AdminMiddleware::class,
           'reader' => \App\Http\Middleware\ReaderMiddleware::class,
        ]); 
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
