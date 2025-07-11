<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Services\ReviewService;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    protected ReviewService $reviewService;
    protected AuthService $authService;

    public function __construct(ReviewService $reviewService, AuthService $authService)
    {
        $this->reviewService = $reviewService;
        $this->authService = $authService;
        
        // Aplicar middleware de autenticación para ciertas rutas
        $this->middleware('auth:sanctum')->only(['store', 'checkEligibility']);
        $this->middleware('throttle:10,1')->only(['store']); // Rate limiting para crear reseñas
    }

    /**
     * Obtiene todas las reseñas aprobadas para mostrar públicamente.
     */
    public function index(): JsonResponse
    {
        try {
            $reviews = $this->reviewService->getApprovedReviews();
            
            return response()->json([
                'status' => 'success',
                'data' => [
                    'reviews' => $reviews->map(function ($review) {
                        return [
                            'id' => $review->id,
                            'user_name' => $review->user->name,
                            'rating' => $review->rating,
                            'comment' => $review->comment,
                            'created_at' => $review->created_at->toISOString(),
                            'formatted_date' => $review->formatted_date,
                            'time_ago' => $review->time_ago,
                            'avatar_color' => $review->avatar_color,
                            'star_rating_html' => $review->star_rating_html
                        ];
                    }),
                    'statistics' => $this->reviewService->getReviewsStatistics()
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Error retrieving reviews: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener las reseñas. Por favor, intenta nuevamente.'
            ], 500);
        }
    }

    /**
     * Almacena una nueva reseña.
     */
    public function store(StoreReviewRequest $request): JsonResponse
    {
        try {
            $review = $this->reviewService->store($request);
            
            return response()->json([
                'status' => 'success',
                'message' => '¡Gracias por tu reseña! Ha sido enviada para revisión y será publicada una vez aprobada.',
                'data' => [
                    'review' => [
                        'id' => $review->id,
                        'user_name' => $review->user->name,
                        'rating' => $review->rating,
                        'comment' => $review->comment,
                        'created_at' => $review->created_at->toISOString(),
                        'is_approved' => $review->is_approved,
                        'avatar_color' => $review->avatar_color
                    ]
                ]
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error storing review: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'request_data' => $request->validated()
            ]);
            
            return response()->json([
                'status' => 'error',
                'message' => 'Error al guardar la reseña. Por favor, intenta nuevamente.'
            ], 500);
        }
    }

    /**
     * Verifica si el usuario actual puede dejar una reseña.
     */
    public function checkEligibility(): JsonResponse
    {
        try {
            $user = $this->authService->getCurrentUser();
            
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'eligible' => false,
                    'message' => 'Debes iniciar sesión para dejar una reseña.'
                ], 401);
            }
            
            $eligibility = $this->reviewService->checkUserEligibility($user);
            
            return response()->json([
                'status' => 'success',
                'eligible' => $eligibility['eligible'],
                'has_orders' => $eligibility['has_orders'],
                'has_existing_review' => $eligibility['has_existing_review'],
                'message' => $eligibility['message'],
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'avatar_color' => $user->avatar_color
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Error checking review eligibility: ' . $e->getMessage(), [
                'user_id' => auth()->id()
            ]);
            
            return response()->json([
                'status' => 'error',
                'message' => 'Error al verificar elegibilidad. Por favor, intenta nuevamente.'
            ], 500);
        }
    }

    /**
     * Obtiene estadísticas de reseñas.
     */
    public function statistics(): JsonResponse
    {
        try {
            $statistics = $this->reviewService->getReviewsStatistics();
            
            return response()->json([
                'status' => 'success',
                'data' => $statistics
            ]);
        } catch (\Exception $e) {
            Log::error('Error retrieving review statistics: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener estadísticas. Por favor, intenta nuevamente.'
            ], 500);
        }
    }

    /**
     * Obtiene reseñas por calificación.
     */
    public function getByRating(Request $request): JsonResponse
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5'
        ]);

        try {
            $reviews = $this->reviewService->getReviewsByRating($request->rating);
            
            return response()->json([
                'status' => 'success',
                'data' => $reviews->map(function ($review) {
                    return [
                        'id' => $review->id,
                        'user_name' => $review->user->name,
                        'rating' => $review->rating,
                        'comment' => $review->comment,
                        'created_at' => $review->created_at->toISOString(),
                        'formatted_date' => $review->formatted_date,
                        'avatar_color' => $review->avatar_color
                    ];
                })
            ]);
        } catch (\Exception $e) {
            Log::error('Error retrieving reviews by rating: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener reseñas por calificación.'
            ], 500);
        }
    }

    /**
     * Obtiene reseñas recientes.
     */
    public function getRecent(Request $request): JsonResponse
    {
        $request->validate([
            'days' => 'nullable|integer|min:1|max:365'
        ]);

        $days = $request->input('days', 30);

        try {
            $reviews = $this->reviewService->getRecentReviews($days);
            
            return response()->json([
                'status' => 'success',
                'data' => $reviews->map(function ($review) {
                    return [
                        'id' => $review->id,
                        'user_name' => $review->user->name,
                        'rating' => $review->rating,
                        'comment' => $review->comment,
                        'created_at' => $review->created_at->toISOString(),
                        'formatted_date' => $review->formatted_date,
                        'avatar_color' => $review->avatar_color
                    ];
                })
            ]);
        } catch (\Exception $e) {
            Log::error('Error retrieving recent reviews: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener reseñas recientes.'
            ], 500);
        }
    }

    /**
     * Métodos deprecados para compatibilidad con código existente.
     * Estos métodos redirigen a la nueva implementación.
     */
    
    /**
     * @deprecated Use index() instead
     */
    public function getReviews(): JsonResponse
    {
        return $this->index();
    }

    /**
     * @deprecated Authentication should be handled by middleware
     */
    public function simulateOrder(Request $request): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => 'Esta funcionalidad ha sido desactivada. Usa el sistema de pedidos real.'
        ], 410);
    }

    /**
     * @deprecated Session-based authentication replaced with proper auth
     */
    public function saveUserSession(Request $request): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => 'Esta funcionalidad ha sido desactivada. Usa el sistema de autenticación real.'
        ], 410);
    }

    /**
     * @deprecated Use proper order system
     */
    public function completeOrder(Request $request): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => 'Esta funcionalidad ha sido desactivada. Usa el sistema de pedidos real.'
        ], 410);
    }
} 