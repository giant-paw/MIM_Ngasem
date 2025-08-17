<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\TokenMismatchException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\IsAdmin::class,
            'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        ]);
        
        $middleware->web(append: [
            \Illuminate\Session\Middleware\AuthenticateSession::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Menangani error 'session expired' agar redirect ke halaman login
        $exceptions->renderable(function (TokenMismatchException $e, $request) {
            return redirect()->route('login')
                             ->with('error', 'Sesi Anda telah berakhir. Silakan login kembali.');
        });
    })->create();