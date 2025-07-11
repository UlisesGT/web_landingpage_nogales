<?php

namespace App\Services;

use App\Models\Review;
use App\Models\User;
use App\Http\Requests\StoreReviewRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;

class ReviewService
{
    /**
     * Get all approved reviews.
     */
    public function getApprovedReviews(): Collection
    {
        return Review::with('user')
            ->approved()
            ->latest()
            ->get();
    }

    /**
     * Get recent approved reviews.
     */
    public function getRecentApprovedReviews(int $limit = 10): Collection
    {
        return Review::with('user')
            ->approved()
            ->latest()
            ->limit($limit)
            ->get();
    }

    /**
     * Store a new review.
     */
    public function store(StoreReviewRequest $request): Review
    {
        return DB::transaction(function () use ($request) {
            $data = $request->getSanitizedData();
            
            $review = Review::create($data);
            
            Log::info('New review created', [
                'review_id' => $review->id,
                'user_id' => $review->user_id,
                'rating' => $review->rating
            ]);
            
            return $review->load('user');
        });
    }

    /**
     * Check if a user is eligible to leave a review.
     */
    public function checkUserEligibility(User $user): array
    {
        $hasOrders = $user->hasCompletedOrders();
        $hasReview = $user->hasReview();
        $eligible = $hasOrders && !$hasReview;

        return [
            'eligible' => $eligible,
            'has_orders' => $hasOrders,
            'has_existing_review' => $hasReview,
            'message' => $this->getEligibilityMessage($eligible, $hasOrders, $hasReview)
        ];
    }

    /**
     * Get eligibility message for the user.
     */
    private function getEligibilityMessage(bool $eligible, bool $hasOrders, bool $hasReview): string
    {
        if ($eligible) {
            return 'Puedes dejar una reseña.';
        }

        if (!$hasOrders) {
            return 'Solo los clientes que han realizado pedidos pueden dejar reseñas.';
        }

        if ($hasReview) {
            return 'Ya has dejado una reseña. Solo se permite una reseña por cliente.';
        }

        return 'No puedes dejar una reseña en este momento.';
    }

    /**
     * Get reviews statistics.
     */
    public function getReviewsStatistics(): array
    {
        $reviews = Review::approved();
        
        $totalReviews = $reviews->count();
        $averageRating = $reviews->avg('rating') ?? 0;
        
        $ratingDistribution = [];
        for ($i = 1; $i <= 5; $i++) {
            $count = $reviews->where('rating', $i)->count();
            $ratingDistribution[$i] = [
                'count' => $count,
                'percentage' => $totalReviews > 0 ? round(($count / $totalReviews) * 100, 1) : 0
            ];
        }

        return [
            'total_reviews' => $totalReviews,
            'average_rating' => round($averageRating, 1),
            'rating_distribution' => $ratingDistribution
        ];
    }

    /**
     * Approve a review.
     */
    public function approve(Review $review, ?User $approvedBy = null): bool
    {
        $result = $review->approve($approvedBy?->id);
        
        if ($result) {
            Log::info('Review approved', [
                'review_id' => $review->id,
                'approved_by' => $approvedBy?->id ?? auth()->id()
            ]);
        }
        
        return $result;
    }

    /**
     * Reject a review.
     */
    public function reject(Review $review): bool
    {
        $result = $review->reject();
        
        if ($result) {
            Log::info('Review rejected', [
                'review_id' => $review->id,
                'rejected_by' => auth()->id()
            ]);
        }
        
        return $result;
    }

    /**
     * Get pending reviews for moderation.
     */
    public function getPendingReviews(): Collection
    {
        return Review::with('user')
            ->pending()
            ->latest()
            ->get();
    }

    /**
     * Delete a review.
     */
    public function delete(Review $review): bool
    {
        $result = $review->delete();
        
        if ($result) {
            Log::info('Review deleted', [
                'review_id' => $review->id,
                'deleted_by' => auth()->id()
            ]);
        }
        
        return $result;
    }

    /**
     * Get reviews by rating.
     */
    public function getReviewsByRating(int $rating): Collection
    {
        return Review::with('user')
            ->approved()
            ->byRating($rating)
            ->latest()
            ->get();
    }

    /**
     * Get recent reviews within specified days.
     */
    public function getRecentReviews(int $days = 30): Collection
    {
        return Review::with('user')
            ->approved()
            ->recent($days)
            ->latest()
            ->get();
    }
} 