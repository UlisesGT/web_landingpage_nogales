import React, { createContext, useContext, useState, useEffect } from 'react';
import { Review, ReviewState } from '@/types';
import axios from '@/services/api';

interface ReviewContextType extends ReviewState {
  addReview: (rating: number, comment: string) => Promise<void>;
  loadReviews: () => Promise<void>;
  approveReview: (reviewId: number) => Promise<void>;
  rejectReview: (reviewId: number) => Promise<void>;
}

const ReviewContext = createContext<ReviewContextType | undefined>(undefined);

export const useReviews = () => {
  const context = useContext(ReviewContext);
  if (!context) {
    throw new Error('useReviews must be used within a ReviewProvider');
  }
  return context;
};

export const ReviewProvider: React.FC<{ children: React.ReactNode }> = ({ children }) => {
  const [reviews, setReviews] = useState<Review[]>([]);
  const [isLoading, setIsLoading] = useState(false);
  const [error, setError] = useState<string | null>(null);

  const loadReviews = async () => {
    setIsLoading(true);
    setError(null);
    try {
      const response = await axios.get('/reviews');
      setReviews(response.data.data);
    } catch (err) {
      setError('Error loading reviews');
      console.error('Error loading reviews:', err);
    } finally {
      setIsLoading(false);
    }
  };

  const addReview = async (rating: number, comment: string) => {
    try {
      const response = await axios.post('/reviews', { rating, comment });
      setReviews(prev => [...prev, response.data.data]);
    } catch (err) {
      setError('Error adding review');
      throw err;
    }
  };

  const approveReview = async (reviewId: number) => {
    try {
      await axios.patch(`/reviews/${reviewId}/approve`);
      setReviews(prev => 
        prev.map(review => 
          review.id === reviewId 
            ? { ...review, status: 'approved' }
            : review
        )
      );
    } catch (err) {
      setError('Error approving review');
      throw err;
    }
  };

  const rejectReview = async (reviewId: number) => {
    try {
      await axios.patch(`/reviews/${reviewId}/reject`);
      setReviews(prev => 
        prev.map(review => 
          review.id === reviewId 
            ? { ...review, status: 'rejected' }
            : review
        )
      );
    } catch (err) {
      setError('Error rejecting review');
      throw err;
    }
  };

  useEffect(() => {
    loadReviews();
  }, []);

  const value = {
    reviews,
    isLoading,
    error,
    addReview,
    loadReviews,
    approveReview,
    rejectReview,
  };

  return (
    <ReviewContext.Provider value={value}>
      {children}
    </ReviewContext.Provider>
  );
}; 