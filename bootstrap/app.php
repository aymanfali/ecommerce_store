<?php

use App\Exceptions\ProductNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->report(function ($e) {
            
            if ($e instanceof ProductNotFoundException) {
                Mail::raw(
                    "A ProductNotFoundException occurred:\n\nMessage: {$e->getMessage()}",
                    function ($message) {
                        $message->to('support@techleaders.com')
                            ->subject('Product Not Found Exception Alert');
                    }
                );
            }
        });
    })->create();
