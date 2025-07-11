<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $start = microtime(true);
        
        // Log the request
        $this->logRequest($request);
        
        $response = $next($request);
        
        // Log the response
        $this->logResponse($request, $response, $start);
        
        return $response;
    }

    /**
     * Log the incoming request.
     */
    private function logRequest(Request $request): void
    {
        // Solo log requests críticos
        $criticalRoutes = [
            'api/auth/login',
            'api/auth/register',
            'api/reviews',
            'forgot-password',
            'reset-password'
        ];

        $shouldLog = false;
        foreach ($criticalRoutes as $route) {
            if (str_contains($request->path(), $route)) {
                $shouldLog = true;
                break;
            }
        }

        if ($shouldLog) {
            Log::info('Request received', [
                'method' => $request->method(),
                'url' => $request->fullUrl(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'user_id' => auth()->id(),
                'referer' => $request->header('referer'),
                'timestamp' => now()->toISOString()
            ]);
        }
    }

    /**
     * Log the response.
     */
    private function logResponse(Request $request, Response $response, float $start): void
    {
        $duration = (microtime(true) - $start) * 1000; // in milliseconds
        
        // Log errores y requests lentos
        if ($response->getStatusCode() >= 400 || $duration > 1000) {
            Log::warning('Request completed', [
                'method' => $request->method(),
                'url' => $request->fullUrl(),
                'status_code' => $response->getStatusCode(),
                'duration_ms' => round($duration, 2),
                'ip' => $request->ip(),
                'user_id' => auth()->id(),
                'memory_usage' => memory_get_peak_usage(true),
                'timestamp' => now()->toISOString()
            ]);
        }
    }
} 