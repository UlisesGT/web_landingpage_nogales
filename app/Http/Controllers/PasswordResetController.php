<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PasswordResetController extends Controller
{
    /**
     * Envía el enlace de restablecimiento de contraseña
     */
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->input('email');
        
        // Simular verificación de usuario en base de datos
        $userExists = $this->checkUserExists($email);
        
        if (!$userExists) {
            return response()->json([
                'status' => 'error',
                'message' => 'No encontramos una cuenta asociada con este correo electrónico.'
            ], 404);
        }

        // Generar token único
        $token = Str::random(64);
        
        // Guardar el token en la "base de datos" (simulado con session)
        $this->storeResetToken($email, $token);
        
        // Simular envío de email
        $this->sendResetEmail($email, $token);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Hemos enviado un enlace de restablecimiento de contraseña a tu correo electrónico.',
            'token' => $token // En producción, esto NO se devolvería
        ]);
    }

    /**
     * Restablece la contraseña del usuario
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

        $token = $request->input('token');
        $email = $request->input('email');
        $password = $request->input('password');

        // Verificar que el token es válido
        if (!$this->verifyResetToken($email, $token)) {
            return response()->json([
                'status' => 'error',
                'message' => 'El enlace de restablecimiento es inválido o ha expirado.'
            ], 400);
        }

        // Simular actualización de contraseña en base de datos
        $this->updatePassword($email, $password);
        
        // Eliminar el token usado
        $this->deleteResetToken($email, $token);

        return response()->json([
            'status' => 'success',
            'message' => 'Tu contraseña ha sido restablecida exitosamente.'
        ]);
    }

    /**
     * Simula la verificación de existencia de usuario
     */
    private function checkUserExists($email)
    {
        // Lista de emails simulados registrados
        $registeredEmails = [
            'test@example.com',
            'user@jaliscoflavors.com',
            'admin@jaliscoflavors.com',
            'demo@test.com'
        ];
        
        return in_array($email, $registeredEmails) || str_contains($email, 'jalisco');
    }

    /**
     * Almacena el token de reset (simulado con session)
     */
    private function storeResetToken($email, $token)
    {
        $resetTokens = session('password_reset_tokens', []);
        $resetTokens[$email] = [
            'token' => $token,
            'created_at' => now(),
            'expires_at' => now()->addHour()
        ];
        session(['password_reset_tokens' => $resetTokens]);
    }

    /**
     * Verifica que el token de reset sea válido
     */
    private function verifyResetToken($email, $token)
    {
        $resetTokens = session('password_reset_tokens', []);
        
        if (!isset($resetTokens[$email])) {
            return false;
        }
        
        $tokenData = $resetTokens[$email];
        
        // Verificar que el token coincida y no haya expirado
        return $tokenData['token'] === $token && 
               now()->isBefore($tokenData['expires_at']);
    }

    /**
     * Elimina el token de reset usado
     */
    private function deleteResetToken($email, $token)
    {
        $resetTokens = session('password_reset_tokens', []);
        unset($resetTokens[$email]);
        session(['password_reset_tokens' => $resetTokens]);
    }

    /**
     * Simula el envío de email de reset
     */
    private function sendResetEmail($email, $token)
    {
        // En un entorno real, aquí se enviaría el email usando Mail::send()
        // Mail::send('emails.password-reset', ['token' => $token], function($message) use ($email) {
        //     $message->to($email)->subject('Restablecer Contraseña - Jalisco Flavors');
        // });
        
        // Por ahora solo lo registramos en el log para demostración
        Log::info("Reset password email sent to: {$email} with token: {$token}");
    }

    /**
     * Simula la actualización de contraseña en base de datos
     */
    private function updatePassword($email, $password)
    {
        // En un entorno real, aquí se actualizaría la contraseña en la base de datos
        // User::where('email', $email)->update(['password' => Hash::make($password)]);
        
        Log::info("Password updated for user: {$email}");
    }
} 