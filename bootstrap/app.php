<?php

use App\Http\Middleware\LocaleMiddleware;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php',
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // ? Middleware global (dijalankan di semua web routes)
        $middleware->web([
            LocaleMiddleware::class,
        ]);

        // ? Alias middleware khusus (dipanggil dengan nama)
        $middleware->alias([
            'role' => RoleMiddleware::class,
            'auth.redirect' => \App\Http\Middleware\RedirectIfAuthenticatedCustom::class,
            'session.check' => \App\Http\Middleware\SessionCheck::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
