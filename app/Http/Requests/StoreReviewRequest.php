<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Verificar que el usuario esté autenticado
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'rating' => [
                'required',
                'integer',
                'min:1',
                'max:5'
            ],
            'comment' => [
                'required',
                'string',
                'min:10',
                'max:500',
                'regex:/^[a-zA-Z0-9\s\.,\!\?\-\(\)]+$/u' // Solo caracteres seguros
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
            'rating.required' => 'La calificación es obligatoria.',
            'rating.integer' => 'La calificación debe ser un número entero.',
            'rating.min' => 'La calificación mínima es 1.',
            'rating.max' => 'La calificación máxima es 5.',
            'comment.required' => 'El comentario es obligatorio.',
            'comment.min' => 'El comentario debe tener al menos 10 caracteres.',
            'comment.max' => 'El comentario no puede exceder 500 caracteres.',
            'comment.regex' => 'El comentario contiene caracteres no permitidos.'
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
            $user = auth()->user();
            
            if (!$user) {
                $validator->errors()->add('user', 'Usuario no autenticado.');
                return;
            }

            // Verificar si el usuario ya tiene una reseña
            if ($user->reviews()->exists()) {
                $validator->errors()->add('review', 'Ya has dejado una reseña anteriormente.');
            }

            // Verificar si el usuario ha realizado pedidos
            if (!$user->orders()->exists()) {
                $validator->errors()->add('order', 'Solo los clientes que han realizado pedidos pueden dejar reseñas.');
            }
        });
    }

    /**
     * Get the sanitized input data.
     *
     * @return array
     */
    public function getSanitizedData(): array
    {
        return [
            'rating' => (int) $this->input('rating'),
            'comment' => strip_tags(trim($this->input('comment'))),
            'user_id' => auth()->id(),
        ];
    }
} 