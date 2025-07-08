<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    /**
     * Obtiene todas las reseñas para mostrar en la página de inicio
     */
    public function getReviews()
    {
        // Simular reseñas de base de datos
        $reviews = $this->getStoredReviews();
        
        return response()->json([
            'status' => 'success',
            'reviews' => $reviews
        ]);
    }

    /**
     * Agrega una nueva reseña (solo usuarios autenticados con pedidos)
     */
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10|max:500'
        ]);

        // Simular verificación de usuario autenticado
        $user = $this->getAuthenticatedUser($request);
        
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Debes estar logueado para dejar una reseña.'
            ], 401);
        }

        // Verificar si el usuario ha hecho pedidos
        if (!$this->userHasOrders($user['email'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Solo los clientes que han realizado pedidos pueden dejar reseñas.'
            ], 403);
        }

        // Verificar si ya ha dejado una reseña
        if ($this->userHasExistingReview($user['email'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ya has dejado una reseña. Solo se permite una reseña por cliente.'
            ], 403);
        }

        // Crear nueva reseña
        $newReview = [
            'id' => uniqid(),
            'user_name' => $user['name'],
            'user_email' => $user['email'],
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
            'created_at' => now()->toISOString(),
            'avatar_color' => $this->generateAvatarColor($user['name'])
        ];

        // Guardar reseña
        $this->saveReview($newReview);
        
        Log::info("New review added by user: {$user['email']}");

        return response()->json([
            'status' => 'success',
            'message' => '¡Gracias por tu reseña! Ha sido agregada exitosamente.',
            'review' => $newReview
        ]);
    }

    /**
     * Verifica si el usuario puede dejar reseñas
     */
    public function checkEligibility(Request $request)
    {
        $user = $this->getAuthenticatedUser($request);
        
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'eligible' => false,
                'message' => 'Debes estar logueado.'
            ]);
        }

        $hasOrders = $this->userHasOrders($user['email']);
        $hasExistingReview = $this->userHasExistingReview($user['email']);

        return response()->json([
            'status' => 'success',
            'eligible' => $hasOrders && !$hasExistingReview,
            'has_orders' => $hasOrders,
            'has_existing_review' => $hasExistingReview,
            'user' => $user
        ]);
    }

    /**
     * Simula la obtención del usuario autenticado
     */
    private function getAuthenticatedUser(Request $request)
    {
        // Simular usuario logueado usando session
        $loggedInUser = session('logged_in_user');
        
        if (!$loggedInUser) {
            return null;
        }

        return $loggedInUser;
    }

    /**
     * Verifica si el usuario ha hecho pedidos
     */
    private function userHasOrders($email)
    {
        // Simular verificación de pedidos usando session/storage
        $userOrders = session('user_orders', []);
        
        // Lista de emails que han hecho pedidos (para demo)
        $usersWithOrders = [
            'test@example.com',
            'user@jaliscoflavors.com',
            'admin@jaliscoflavors.com',
            'demo@test.com'
        ];
        
        return isset($userOrders[$email]) || in_array($email, $usersWithOrders);
    }

    /**
     * Verifica si el usuario ya tiene una reseña
     */
    private function userHasExistingReview($email)
    {
        $reviews = $this->getStoredReviews();
        
        foreach ($reviews as $review) {
            if ($review['user_email'] === $email) {
                return true;
            }
        }
        
        return false;
    }

    /**
     * Obtiene las reseñas almacenadas
     */
    private function getStoredReviews()
    {
        $reviews = session('customer_reviews', []);
        
        // Si no hay reseñas en session, usar reseñas por defecto
        if (empty($reviews)) {
            $reviews = [
                [
                    'id' => 'default_1',
                    'user_name' => 'Isabella Rodriguez',
                    'user_email' => 'isabella@example.com',
                    'rating' => 5,
                    'comment' => 'The birria tacos were absolutely incredible! The meat was so tender and flavorful, and the consommé was the perfect complement. I can\'t wait to come back and try more dishes.',
                    'created_at' => now()->subWeeks(2)->toISOString(),
                    'avatar_color' => 'orange'
                ],
                [
                    'id' => 'default_2',
                    'user_name' => 'Ethan Martinez',
                    'user_email' => 'ethan@example.com',
                    'rating' => 4,
                    'comment' => 'I had the torta ahogada and it was a unique and delicious experience. The sauce had a great kick, and the sandwich was packed with flavor. I\'ll definitely be ordering it again.',
                    'created_at' => now()->subMonth()->toISOString(),
                    'avatar_color' => 'blue'
                ],
                [
                    'id' => 'default_3',
                    'user_name' => 'Sophia Garcia',
                    'user_email' => 'sophia@example.com',
                    'rating' => 5,
                    'comment' => 'Casa Jalisco is my new favorite spot for authentic Mexican food. The carne asada was cooked to perfection, and the service was excellent. Highly recommend!',
                    'created_at' => now()->subMonths(2)->toISOString(),
                    'avatar_color' => 'green'
                ]
            ];
            session(['customer_reviews' => $reviews]);
        }
        
        // Ordenar por fecha de creación (más recientes primero)
        usort($reviews, function($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });
        
        return $reviews;
    }

    /**
     * Guarda una nueva reseña
     */
    private function saveReview($review)
    {
        $reviews = $this->getStoredReviews();
        array_unshift($reviews, $review); // Agregar al principio
        session(['customer_reviews' => $reviews]);
    }

    /**
     * Genera un color de avatar basado en el nombre
     */
    private function generateAvatarColor($name)
    {
        $colors = ['orange', 'blue', 'green', 'purple', 'red', 'yellow', 'indigo', 'pink'];
        $index = strlen($name) % count($colors);
        return $colors[$index];
    }

    /**
     * Simula agregar un pedido para un usuario (para testing)
     */
    public function simulateOrder(Request $request)
    {
        $request->validate([
            'user_email' => 'required|email'
        ]);

        $userOrders = session('user_orders', []);
        $userOrders[$request->input('user_email')] = [
            'order_id' => uniqid(),
            'created_at' => now()->toISOString()
        ];
        session(['user_orders' => $userOrders]);

        return response()->json([
            'status' => 'success',
            'message' => 'Pedido simulado agregado para el usuario.'
        ]);
    }

    /**
     * Guarda la información del usuario en la sesión para el sistema de reseñas
     */
    public function saveUserSession(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:255'
        ]);

        $userData = [
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'logged_in_at' => now()->toISOString()
        ];

        session(['logged_in_user' => $userData]);

        return response()->json([
            'status' => 'success',
            'message' => 'Usuario registrado en sesión.'
        ]);
    }

    /**
     * Simula completar un pedido y registrar al usuario como elegible para reseñas
     */
    public function completeOrder(Request $request)
    {
        $request->validate([
            'user_email' => 'required|email',
            'user_name' => 'required|string',
            'order_data' => 'required|array'
        ]);

        $email = $request->input('user_email');
        $name = $request->input('user_name');
        $orderData = $request->input('order_data');

        // Guardar usuario en sesión
        $userData = [
            'email' => $email,
            'name' => $name,
            'logged_in_at' => now()->toISOString()
        ];
        session(['logged_in_user' => $userData]);

        // Registrar pedido
        $userOrders = session('user_orders', []);
        $userOrders[$email] = [
            'order_id' => uniqid(),
            'created_at' => now()->toISOString(),
            'order_data' => $orderData
        ];
        session(['user_orders' => $userOrders]);

        Log::info("Order completed for user: {$email}");

        return response()->json([
            'status' => 'success',
            'message' => 'Pedido completado exitosamente. Ahora puedes dejar reseñas.'
        ]);
    }
} 