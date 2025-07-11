<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No autenticado.'
                ], 401);
            }
            return redirect()->route('login');
        }

        // Verificar si el usuario es administrador
        $user = auth()->user();
        $adminEmails = [
            'admin@jaliscoflavors.com',
            'admin@example.com',
            'superadmin@jaliscoflavors.com'
        ];

        if (!in_array($user->email, $adminEmails)) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No tienes permisos de administrador.'
                ], 403);
            }
            abort(403, 'No tienes permisos de administrador.');
        }

        return $next($request);
    }
} 