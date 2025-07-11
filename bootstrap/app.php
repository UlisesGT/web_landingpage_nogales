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
        // Middleware con alias
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'security.headers' => \App\Http\Middleware\SecurityHeaders::class,
            'log.requests' => \App\Http\Middleware\LogRequests::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Configuración de manejo de excepciones
        $exceptions->render(function (Throwable $e, $request) {
            // Log de errores críticos
            if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
                $statusCode = $e->getStatusCode();
                if ($statusCode >= 500) {
                    \Log::error('Server error occurred', [
                        'exception' => $e->getMessage(),
                        'file' => $e->getFile(),
                        'line' => $e->getLine(),
                        'url' => $request->fullUrl(),
                        'user_id' => auth()->id(),
                        'ip' => $request->ip(),
                        'user_agent' => $request->userAgent(),
                        'timestamp' => now()->toISOString()
                    ]);
                }
            }
            
            // Respuestas JSON para APIs
            if ($request->is('api/*') && $request->expectsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $e instanceof \Symfony\Component\HttpKernel\Exception\HttpException 
                        ? $e->getMessage() 
                        : 'Error interno del servidor.',
                    'code' => $e instanceof \Symfony\Component\HttpKernel\Exception\HttpException 
                        ? $e->getStatusCode() 
                        : 500
                ], $e instanceof \Symfony\Component\HttpKernel\Exception\HttpException 
                    ? $e->getStatusCode() 
                    : 500);
            }
            
            return null; // Let Laravel handle the default response
        });
    })
    ->create();
