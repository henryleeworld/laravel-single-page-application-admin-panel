<?php

use App\Http\Middleware\Language;
use App\Http\Middleware\RateLimit;
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
        $middleware->group('splade', [\ProtoneMedia\Splade\Http\SpladeMiddleware::class]);
        $middleware->web(append: [
            Language::class,
            RateLimit::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(\ProtoneMedia\Splade\SpladeCore::exceptionHandler($exceptions->handler));
        //
    })->create();
