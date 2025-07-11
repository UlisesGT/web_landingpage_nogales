<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
        
        // Aplicar middleware de autenticación para ciertas rutas
        $this->middleware('auth:sanctum')->only(['logout', 'user']);
        $this->middleware('throttle:5,1')->only(['login', 'register']); // Rate limiting para login/register
    }

    /**
     * Iniciar sesión.
     */
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $result = $this->authService->login($request);
            
            return response()->json([
                'status' => 'success',
                'message' => $result['message'],
                'data' => [
                    'user' => [
                        'id' => $result['user']->id,
                        'name' => $result['user']->name,
                        'email' => $result['user']->email,
                        'avatar_color' => $result['user']->avatar_color
                    ],
                    'redirect' => route('home')
                ]
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Credenciales inválidas.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Error interno del servidor. Por favor, intenta nuevamente.'
            ], 500);
        }
    }

    /**
     * Registrar usuario.
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $user = $this->authService->register($request->validated());
            
            // Iniciar sesión automáticamente después del registro
            auth()->login($user);
            
            return response()->json([
                'status' => 'success',
                'message' => '¡Registro exitoso! Tu cuenta ha sido creada.',
                'data' => [
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'avatar_color' => $user->avatar_color
                    ],
                    'redirect' => route('home')
                ]
            ], 201);
        } catch (\Exception $e) {
            Log::error('Registration error: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Error al crear la cuenta. Por favor, intenta nuevamente.'
            ], 500);
        }
    }

    /**
     * Cerrar sesión.
     */
    public function logout(): JsonResponse
    {
        try {
            $result = $this->authService->logout();
            
            return response()->json([
                'status' => 'success',
                'message' => $result['message'],
                'redirect' => route('home')
            ]);
        } catch (\Exception $e) {
            Log::error('Logout error: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Error al cerrar sesión.'
            ], 500);
        }
    }

    /**
     * Obtener usuario actual.
     */
    public function user(): JsonResponse
    {
        try {
            $user = $this->authService->getCurrentUser();
            
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Usuario no autenticado.'
                ], 401);
            }
            
            return response()->json([
                'status' => 'success',
                'data' => [
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'avatar_color' => $user->avatar_color,
                        'can_leave_review' => $user->canLeaveReview(),
                        'has_orders' => $user->hasCompletedOrders(),
                        'has_review' => $user->hasReview()
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('User info error: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener información del usuario.'
            ], 500);
        }
    }

    /**
     * Verificar si el usuario está autenticado.
     */
    public function check(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'authenticated' => $this->authService->isAuthenticated(),
            'user' => $this->authService->getCurrentUser() ? [
                'id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'avatar_color' => auth()->user()->avatar_color
            ] : null
        ]);
    }

    /**
     * Actualizar última actividad del usuario.
     */
    public function updateActivity(): JsonResponse
    {
        try {
            $this->authService->updateLastActivity();
            
            return response()->json([
                'status' => 'success',
                'message' => 'Actividad actualizada.'
            ]);
        } catch (\Exception $e) {
            Log::error('Update activity error: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Error al actualizar actividad.'
            ], 500);
        }
    }

    /**
     * Validar fortaleza de contraseña.
     */
    public function validatePassword(Request $request): JsonResponse
    {
        $request->validate([
            'password' => 'required|string'
        ]);

        try {
            $result = $this->authService->validatePasswordStrength($request->password);
            
            return response()->json([
                'status' => 'success',
                'data' => $result
            ]);
        } catch (\Exception $e) {
            Log::error('Password validation error: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Error al validar contraseña.'
            ], 500);
        }
    }
} 