<?php

namespace App\Http;

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Global middleware
    ];

    protected $middlewareGroups = [
        'web' => [
            // Web middleware
            // \App\Http\Middleware\CartMiddleware::class,
        ],

        'api' => [
            // API middleware
        ],
    ];

    protected $routeMiddleware = [
     
    ];
}