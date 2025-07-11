<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:128'
            ],
            'remember' => 'boolean',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe tener un formato válido.',
            'email.regex' => 'El correo electrónico contiene caracteres no permitidos.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.max' => 'La contraseña no puede exceder 128 caracteres.',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Implementar rate limiting
            $key = $this->getRateLimitKey();
            
            if (RateLimiter::tooManyAttempts($key, 5)) {
                $seconds = RateLimiter::availableIn($key);
                $validator->errors()->add('email', 
                    "Demasiados intentos de inicio de sesión. Inténtalo de nuevo en {$seconds} segundos."
                );
            }
        });
    }

    /**
     * Get the rate limit key for the request.
     *
     * @return string
     */
    protected function getRateLimitKey(): string
    {
        return 'login.' . Str::lower($this->input('email')) . '.' . $this->ip();
    }

    /**
     * Get the sanitized input data.
     *
     * @return array
     */
    public function getSanitizedData(): array
    {
        return [
            'email' => strtolower(trim($this->input('email'))),
            'password' => $this->input('password'),
            'remember' => $this->boolean('remember'),
        ];
    }

    /**
     * Record a login attempt for rate limiting.
     *
     * @return void
     */
    public function recordLoginAttempt(): void
    {
        RateLimiter::hit($this->getRateLimitKey(), 900); // 15 minutos
    }

    /**
     * Clear login attempts for successful login.
     *
     * @return void
     */
    public function clearLoginAttempts(): void
    {
        RateLimiter::clear($this->getRateLimitKey());
    }
} 