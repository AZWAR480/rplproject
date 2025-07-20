<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // Middleware global lainnya
        // \App\Http\Middleware\AdminMiddleware::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            // Middleware grup 'web'
        ],

        'api' => [
            // Middleware grup 'api'
        ],
    ];

    protected $routeMiddleware = [
        // Middleware lainnya
        // 'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];
}
