<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use App\Services\AuthService;

class RegisterRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:255',
                'min:2',
                'regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/' // Solo letras y espacios
            ],
            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
                'unique:users,email',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'phone' => [
                'required',
                'string',
                'regex:/^[\+]?[1-9][\d]{0,15}$/' // Formato internacional de teléfono
            ],
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
                'confirmed'
            ],
            'password_confirmation' => [
                'required',
                'string'
            ],
            'terms' => [
                'required',
                'accepted'
            ]
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
            'name.required' => 'El nombre es obligatorio.',
            'name.min' => 'El nombre debe tener al menos 2 caracteres.',
            'name.max' => 'El nombre no puede exceder 255 caracteres.',
            'name.regex' => 'El nombre solo puede contener letras y espacios.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe tener un formato válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'email.regex' => 'El correo electrónico contiene caracteres no permitidos.',
            'phone.required' => 'El número de teléfono es obligatorio.',
            'phone.regex' => 'El número de teléfono no tiene un formato válido.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de contraseña no coincide.',
            'password_confirmation.required' => 'Debes confirmar tu contraseña.',
            'terms.required' => 'Debes aceptar los términos y condiciones.',
            'terms.accepted' => 'Debes aceptar los términos y condiciones.',
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
            $authService = app(AuthService::class);
            
            // Verificar si el usuario ya existe
            if ($authService->userExists($this->input('email'))) {
                $validator->errors()->add('email', 'Este correo electrónico ya está registrado.');
            }
        });
    }

    /**
     * Get the validated data with proper formatting.
     *
     * @return array
     */
    public function getValidatedData(): array
    {
        return [
            'name' => trim($this->input('name')),
            'email' => strtolower(trim($this->input('email'))),
            'phone' => $this->input('phone'),
            'password' => $this->input('password'),
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => trim($this->name),
            'email' => strtolower(trim($this->email)),
        ]);
    }
} 