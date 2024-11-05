<?php

use App\Http\Middleware\TestMiddleware;
use App\Http\Middleware\TestMiddleware2;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use PHPUnit\Event\Code\Test;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // global middleware
        // $middleware->append(TestMiddleware::class);

        // group middleware
        // $middleware->web(append: [
        //     TestMiddleware::class
        // ]);

        // alias middleware
        $middleware->alias([
            'check' => TestMiddleware::class,
            'check2' => TestMiddleware2::class
        ]);

        // priority middleware
        $middleware->priority([
            TestMiddleware2::class,
            TestMiddleware::class
        ]);

        $middleware->redirectGuestsTo('/login');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
