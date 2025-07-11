<?php

namespace App\Services;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthService
{
    /**
     * Attempt to authenticate a user.
     */
    public function login(LoginRequest $request): array
    {
        $credentials = $request->getSanitizedData();
        $remember = $credentials['remember'] ?? false;
        
        // Record login attempt for rate limiting
        $request->recordLoginAttempt();
        
        // Attempt authentication
        if (!Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password']
        ], $remember)) {
            
            Log::warning('Failed login attempt', [
                'email' => $credentials['email'],
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent()
            ]);
            
            throw ValidationException::withMessages([
                'email' => ['Las credenciales proporcionadas no coinciden con nuestros registros.'],
            ]);
        }
        
        // Clear login attempts on success
        $request->clearLoginAttempts();
        
        $user = Auth::user();
        
        Log::info('User logged in successfully', [
            'user_id' => $user->id,
            'email' => $user->email,
            'ip' => request()->ip()
        ]);
        
        return [
            'user' => $user,
            'message' => "¡Bienvenido {$user->name}! Inicio de sesión exitoso."
        ];
    }

    /**
     * Log out the current user.
     */
    public function logout(): array
    {
        $user = Auth::user();
        
        if ($user) {
            Log::info('User logged out', [
                'user_id' => $user->id,
                'email' => $user->email,
                'ip' => request()->ip()
            ]);
        }
        
        Auth::logout();
        
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        return [
            'message' => 'Sesión cerrada exitosamente.'
        ];
    }

    /**
     * Register a new user.
     */
    public function register(array $data): User
    {
        $userData = [
            'name' => $data['name'],
            'email' => strtolower(trim($data['email'])),
            'password' => Hash::make($data['password']),
        ];
        
        $user = User::create($userData);
        
        Log::info('New user registered', [
            'user_id' => $user->id,
            'email' => $user->email,
            'ip' => request()->ip()
        ]);
        
        return $user;
    }

    /**
     * Check if a user exists by email.
     */
    public function userExists(string $email): bool
    {
        return User::where('email', strtolower(trim($email)))->exists();
    }

    /**
     * Get the current authenticated user.
     */
    public function getCurrentUser(): ?User
    {
        return Auth::user();
    }

    /**
     * Check if the current user is authenticated.
     */
    public function isAuthenticated(): bool
    {
        return Auth::check();
    }

    /**
     * Refresh the user's session.
     */
    public function refreshSession(): void
    {
        request()->session()->regenerate();
    }

    /**
     * Update the user's last activity.
     */
    public function updateLastActivity(): void
    {
        if ($user = Auth::user()) {
            $user->update(['last_activity' => now()]);
        }
    }

    /**
     * Validate password strength.
     */
    public function validatePasswordStrength(string $password): array
    {
        $errors = [];
        
        if (strlen($password) < 8) {
            $errors[] = 'La contraseña debe tener al menos 8 caracteres.';
        }
        
        if (!preg_match('/[A-Z]/', $password)) {
            $errors[] = 'La contraseña debe contener al menos una letra mayúscula.';
        }
        
        if (!preg_match('/[a-z]/', $password)) {
            $errors[] = 'La contraseña debe contener al menos una letra minúscula.';
        }
        
        if (!preg_match('/\d/', $password)) {
            $errors[] = 'La contraseña debe contener al menos un número.';
        }
        
        if (!preg_match('/[^A-Za-z0-9]/', $password)) {
            $errors[] = 'La contraseña debe contener al menos un carácter especial.';
        }
        
        return [
            'valid' => empty($errors),
            'errors' => $errors
        ];
    }
} 