import { useState, useEffect, useCallback } from 'react';
import ApiService from '@/services/ApiService';

// 1. Definir tipos
interface Review {
    id: number;
    user_name: string;
    rating: number;
    comment: string;
    time_ago: string;
    avatar_color: string;
}

interface ReviewStatistics {
    average_rating: number;
    total_reviews: number;
    rating_distribution: Record<number, { count: number; percentage: number }>;
}

interface UseReviewsReturn {
    reviews: Review[];
    statistics: ReviewStatistics | null;
    isLoading: boolean;
    isEligible: boolean;
    loadReviews: () => Promise<void>;
    submitReview: (review: { rating: number; comment: string }) => Promise<void>;
}

// 2. Crear el Hook
export const useReviews = (): UseReviewsReturn => {
    const [reviews, setReviews] = useState<Review[]>([]);
    const [statistics, setStatistics] = useState<ReviewStatistics | null>(null);
    const [isLoading, setIsLoading] = useState(true);
    const [isEligible, setIsEligible] = useState(false);

    const loadReviews = useCallback(async () => {
        setIsLoading(true);
        try {
            const { data } = await ApiService.get('/reviews');
            if (data.status === 'success') {
                setReviews(data.data.reviews);
                setStatistics(data.data.statistics);
            }
        } catch (error) {
            console.error('Error loading reviews:', error);
        } finally {
            setIsLoading(false);
        }
    }, []);

    const checkEligibility = useCallback(async () => {
        try {
            const { data } = await ApiService.get('/reviews/eligibility');
            if (data.status === 'success') {
                setIsEligible(data.eligible);
            }
        } catch (error) {
            // Si falla, el usuario no es elegible (ej. no está logueado)
            setIsEligible(false);
        }
    }, []);

    useEffect(() => {
        loadReviews();
        checkEligibility();
    }, [loadReviews, checkEligibility]);

    const submitReview = async (review: { rating: number; comment: string }) => {
        setIsLoading(true);
        try {
            await ApiService.post('/reviews', review);
            // Recargar las reseñas y la elegibilidad después de enviar
            await loadReviews();
            await checkEligibility();
        } catch (error) {
            console.error('Error submitting review:', error);
            throw error;
        } finally {
            setIsLoading(false);
        }
    };

    return {
        reviews,
        statistics,
        isLoading,
        isEligible,
        loadReviews,
        submitReview,
    };
};
