<?php

use App\Http\Middleware\OnlyMe;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))  // set the base path of the application
    ->withRouting(
        web: __DIR__.'/../routes/web.php', // this is the web routes file
        api: __DIR__.'/../routes/api.php', // this is the api routes file
        commands: __DIR__.'/../routes/console.php',  // this is the console commands file
        health: '/up',                          // this is the health check endpoint
    )
    ->withMiddleware(function (Middleware $middleware): void {  //
        $middleware->alias(['OnlyMe' => OnlyMe::class , 'role' => RoleMiddleware::class ]) ;
    })
   ->withExceptions(function (Exceptions $exceptions): void {

        $exceptions->render(function (AuthenticationException $e, $request) {

          if ($request->expectsJson() || $request->is('api/*')) {

                return response()->json([
                    'status'  => 'error',
                    'code'    => 401,
                    'message' => 'Unauthenticated.',
                    'reason'  => 'Invalid or missing access token',
                ], 401);
            }

    });

})->create();
