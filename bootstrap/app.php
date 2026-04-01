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
        $middleware->redirectGuestsTo('/login');
    $middleware->redirectUsersTo(function() {
        if (Auth::guard('admin')->check()) {
            return '/admin/dashboard/' . Auth::guard('admin')->user()->id;
        }
        if (Auth::guard('web')->check()) {
            return '/critique/dashboard/' . Auth::guard('web')->user()->id;
        }
    });
    $middleware->alias([
        'isAdmin' => \App\Http\Middleware\IsAdmin::class,
        'isCritique' => \App\Http\Middleware\IsCritique::class,
    ]);
})
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
