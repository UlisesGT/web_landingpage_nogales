<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Procesar el formulario de contacto
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ], [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email debe ser válido',
            'subject.required' => 'El asunto es requerido',
            'message.required' => 'El mensaje es requerido',
            'message.max' => 'El mensaje no puede exceder 1000 caracteres'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Aquí podrías enviar el email
            // Mail::send('emails.contact', $request->all(), function($message) use ($request) {
            //     $message->to(config('mail.contact_email', 'info@casajalisco.com'));
            //     $message->subject('Nuevo mensaje de contacto: ' . $request->subject);
            // });

            // Por ahora solo registramos en logs
            Log::info('Nuevo mensaje de contacto', [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Mensaje enviado correctamente. Nos pondremos en contacto contigo pronto.'
            ]);

        } catch (\Exception $e) {
            Log::error('Error al procesar mensaje de contacto: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al enviar el mensaje. Por favor intenta nuevamente.'
            ], 500);
        }
    }

    /**
     * Obtener información de contacto
     */
    public function getInfo()
    {
        return response()->json([
            'restaurant' => [
                'name' => 'Casa Jalisco',
                'description' => 'Auténtica comida jalisciense en Nogales',
                'email' => 'info@casajalisco.com',
                'phone' => '(631) 123-4567',
                'whatsapp' => '(631) 123-4567',
                'social_media' => [
                    'facebook' => 'https://facebook.com/casajalisco',
                    'instagram' => 'https://instagram.com/casajalisco',
                    'twitter' => 'https://twitter.com/casajalisco'
                ]
            ],
            'locations' => [
                [
                    'id' => 1,
                    'name' => 'Casa Jalisco - Centro',
                    'address' => 'Calle Principal 123, Centro, Nogales',
                    'phone' => '(631) 123-4567',
                    'hours' => 'Lun-Dom: 8:00 AM - 10:00 PM',
                    'coordinates' => ['lat' => 31.3402, 'lng' => -110.9342]
                ],
                [
                    'id' => 2,
                    'name' => 'Casa Jalisco - Norte',
                    'address' => 'Av. Tecnológico 456, Col. Norte, Nogales',
                    'phone' => '(631) 123-4568',
                    'hours' => 'Lun-Dom: 9:00 AM - 11:00 PM',
                    'coordinates' => ['lat' => 31.3500, 'lng' => -110.9400]
                ]
            ]
        ]);
    }
} 