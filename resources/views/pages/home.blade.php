@extends('layouts.app')

@section('title', 'Casa Jalisco - Authentic Mexican Restaurant')
@section('description', 'Experience the authentic flavors of Jalisco, Mexico, right here in your neighborhood. From mouthwatering tortas ahogadas, every dish is crafted with passion and tradition.')

@section('content')
<!-- Hero Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="relative bg-gray-100 rounded-2xl overflow-hidden h-96 md:h-[500px]">
        <!-- Hero Background Image Placeholder -->
        <div class="absolute inset-0 bg-gradient-to-r from-gray-800 via-gray-700 to-gray-600">
            <!-- Simulate restaurant interior with orange seating -->
            <div class="absolute inset-0" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('data:image/svg+xml,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 1000 600&quot;><rect width=&quot;100%&quot; height=&quot;100%&quot; fill=&quot;%23374151&quot;/><rect x=&quot;100&quot; y=&quot;300&quot; width=&quot;800&quot; height=&quot;200&quot; fill=&quot;%23f97316&quot; rx=&quot;20&quot;/><circle cx=&quot;500&quot; cy=&quot;150&quot; r=&quot;40&quot; fill=&quot;%23fbbf24&quot;/></svg>'); background-size: cover; background-position: center;"></div>
        </div>
        
        <!-- Hero Content -->
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white px-6">
            <div class="max-w-4xl">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Welcome to Casa Jalisco
                </h1>
                <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto leading-relaxed opacity-90">
                    Experience the authentic flavors of Jalisco, Mexico, right here in your neighborhood. From our famous mouthwatering tortas ahogadas, every dish is crafted with passion and tradition.
                </p>
                <button class="btn-primary text-lg px-8 py-3">
                    View Menu
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Featured Dishes Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h2 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-12">Featured Dishes</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Birria Tacos -->
        <div class="dish-card bg-white shadow-card">
            <div class="h-64 bg-gradient-to-br from-orange-100 to-orange-200 relative overflow-hidden">
                <!-- Birria Tacos Image Placeholder -->
                <div class="absolute inset-0 bg-gradient-to-br from-red-900 via-red-800 to-orange-700">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-32 h-32 bg-orange-400 rounded-full opacity-20"></div>
                    </div>
                    <!-- Simulate tacos with meat -->
                    <div class="absolute bottom-6 left-6 right-6">
                        <div class="bg-yellow-600 h-8 rounded-lg opacity-80 mb-2"></div>
                        <div class="bg-red-700 h-6 rounded-lg opacity-70"></div>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-semibold text-dark-gray-900 mb-2">Birria Tacos</h3>
                <p class="text-dark-gray-600 text-sm">Slow-cooked beef tacos with a rich consommé.</p>
            </div>
        </div>

        <!-- Torta Ahogada -->
        <div class="dish-card bg-white shadow-card">
            <div class="h-64 bg-gradient-to-br from-yellow-100 to-yellow-200 relative overflow-hidden">
                <!-- Torta Ahogada Image Placeholder -->
                <div class="absolute inset-0 bg-gradient-to-br from-yellow-800 via-orange-600 to-red-600">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-40 h-20 bg-yellow-200 rounded-lg opacity-90 shadow-lg"></div>
                    </div>
                    <!-- Simulate sauce dripping -->
                    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
                        <div class="w-2 h-12 bg-red-600 rounded-full opacity-80"></div>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-semibold text-dark-gray-900 mb-2">Torta Ahogada</h3>
                <p class="text-dark-gray-600 text-sm">A traditional sandwich drenched in a spicy tomato sauce.</p>
            </div>
        </div>

        <!-- Carne Asada -->
        <div class="dish-card bg-white shadow-card">
            <div class="h-64 bg-gradient-to-br from-green-100 to-green-200 relative overflow-hidden">
                <!-- Carne Asada Image Placeholder -->
                <div class="absolute inset-0 bg-gradient-to-br from-gray-800 via-red-900 to-orange-800">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-36 h-24 bg-red-800 rounded-lg opacity-90 shadow-lg"></div>
                    </div>
                    <!-- Simulate grill marks and sides -->
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <div class="w-32 h-1 bg-black opacity-40 mb-2"></div>
                        <div class="w-32 h-1 bg-black opacity-40 mb-2"></div>
                        <div class="w-32 h-1 bg-black opacity-40"></div>
                    </div>
                    <!-- Garnish -->
                    <div class="absolute bottom-4 right-4">
                        <div class="w-8 h-8 bg-green-500 rounded-full opacity-70"></div>
                        <div class="w-6 h-6 bg-red-500 rounded-full opacity-70 ml-2"></div>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-semibold text-dark-gray-900 mb-2">Carne Asada</h3>
                <p class="text-dark-gray-600 text-sm">Grilled marinated beef served with sides.</p>
            </div>
        </div>
    </div>
</section>

<!-- Customer Reviews Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16" id="reviews-section">
    <div class="flex items-center justify-between mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-dark-gray-900">What Our Customers Say</h2>
        <!-- Add Review Button -->
        <button 
            id="add-review-btn" 
            class="hidden bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
            Add Review
        </button>
    </div>

    <!-- Review Form Modal -->
    <div id="review-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl max-w-md w-full p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-semibold text-dark-gray-900">Add Your Review</h3>
                <button id="close-modal" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <form id="review-form" class="space-y-4">
                <!-- Rating Selection -->
                <div>
                    <label class="block text-sm font-medium text-dark-gray-700 mb-2">Rating</label>
                    <div class="flex space-x-1" id="star-rating">
                        <button type="button" class="star-btn text-gray-300 hover:text-yellow-400 transition-colors" data-rating="1">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </button>
                        <button type="button" class="star-btn text-gray-300 hover:text-yellow-400 transition-colors" data-rating="2">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </button>
                        <button type="button" class="star-btn text-gray-300 hover:text-yellow-400 transition-colors" data-rating="3">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </button>
                        <button type="button" class="star-btn text-gray-300 hover:text-yellow-400 transition-colors" data-rating="4">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </button>
                        <button type="button" class="star-btn text-gray-300 hover:text-yellow-400 transition-colors" data-rating="5">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </button>
                    </div>
                    <input type="hidden" id="rating-input" name="rating" value="">
                </div>

                <!-- Comment -->
                <div>
                    <label for="comment" class="block text-sm font-medium text-dark-gray-700 mb-2">Your Review</label>
                    <textarea 
                        id="comment" 
                        name="comment" 
                        rows="4" 
                        maxlength="500"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 resize-none"
                        placeholder="Share your experience with Jalisco Flavors..."></textarea>
                    <div class="text-right text-sm text-gray-500 mt-1">
                        <span id="char-count">0</span>/500
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex space-x-3 pt-4">
                    <button 
                        type="button" 
                        id="cancel-review"
                        class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                        Cancel
                    </button>
                    <button 
                        type="submit"
                        id="submit-review"
                        class="flex-1 bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                        Submit Review
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Reviews Loading State -->
    <div id="reviews-loading" class="text-center py-8">
        <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-orange-500"></div>
        <p class="mt-2 text-gray-600">Loading reviews...</p>
    </div>

    <!-- Reviews Container -->
    <div id="reviews-container" class="space-y-6 hidden">
        <!-- Reviews will be loaded dynamically here -->
    </div>

    <!-- No Reviews Message -->
    <div id="no-reviews" class="hidden text-center py-12">
        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
        </svg>
        <h3 class="text-lg font-medium text-gray-900 mb-2">No reviews yet</h3>
        <p class="text-gray-600 mb-4">Be the first to share your experience!</p>
    </div>

    <!-- Messages -->
    <div id="review-success" class="hidden mt-6 p-4 bg-green-50 border border-green-200 rounded-lg">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <p class="text-green-800" id="review-success-text"></p>
        </div>
    </div>

    <div id="review-error" class="hidden mt-6 p-4 bg-red-50 border border-red-200 rounded-lg">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <p class="text-red-800" id="review-error-text"></p>
        </div>
    </div>

    <!-- Demo Info for Logged Users -->
    <div id="demo-info" class="hidden mt-8 p-4 bg-blue-50 border border-blue-200 rounded-lg">
        <div class="flex items-start">
            <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div>
                <h4 class="text-sm font-semibold text-blue-800 mb-1">Demo Information</h4>
                <p class="text-sm text-blue-700" id="demo-info-text"></p>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const addReviewBtn = document.getElementById('add-review-btn');
    const reviewModal = document.getElementById('review-modal');
    const closeModal = document.getElementById('close-modal');
    const cancelReview = document.getElementById('cancel-review');
    const reviewForm = document.getElementById('review-form');
    const starButtons = document.querySelectorAll('.star-btn');
    const ratingInput = document.getElementById('rating-input');
    const commentField = document.getElementById('comment');
    const charCount = document.getElementById('char-count');
    const reviewsContainer = document.getElementById('reviews-container');
    const reviewsLoading = document.getElementById('reviews-loading');
    const noReviews = document.getElementById('no-reviews');
    const reviewSuccess = document.getElementById('review-success');
    const reviewError = document.getElementById('review-error');
    const demoInfo = document.getElementById('demo-info');
    
    let selectedRating = 0;
    let userEligibility = null;

    // Initialize
    init();

    async function init() {
        await loadReviews();
        await checkUserEligibility();
    }

    // Load and display reviews
    async function loadReviews() {
        try {
            const response = await fetch('/api/reviews');
            const data = await response.json();
            
            if (data.status === 'success') {
                displayReviews(data.reviews);
            } else {
                showNoReviews();
            }
        } catch (error) {
            console.error('Error loading reviews:', error);
            showNoReviews();
        } finally {
            reviewsLoading.classList.add('hidden');
        }
    }

    // Check if user can add reviews
    async function checkUserEligibility() {
        try {
            const response = await fetch('/api/reviews/check-eligibility');
            const data = await response.json();
            
            userEligibility = data;
            
            if (data.status === 'success' && data.eligible) {
                // User can add review
                addReviewBtn.classList.remove('hidden');
                showDemoInfo(`¡Hola ${data.user.name}! Puedes agregar una reseña porque has realizado pedidos anteriormente.`);
            } else if (data.status === 'success' && data.user) {
                // User is logged but not eligible
                if (!data.has_orders) {
                    showDemoInfo(`Hola ${data.user.name}. Para agregar reseñas necesitas haber realizado al menos un pedido. <a href="/order-online" class="underline text-blue-600">¡Haz tu primer pedido aquí!</a>`);
                } else if (data.has_existing_review) {
                    showDemoInfo(`Hola ${data.user.name}. Ya has dejado una reseña. Solo se permite una reseña por cliente.`);
                }
            } else {
                // User not logged in
                showDemoInfo(`<a href="/login" class="underline text-blue-600">Inicia sesión</a> y realiza un pedido para poder agregar reseñas.`);
            }
        } catch (error) {
            console.error('Error checking eligibility:', error);
        }
    }

    // Display reviews
    function displayReviews(reviews) {
        if (reviews.length === 0) {
            showNoReviews();
            return;
        }

        reviewsContainer.innerHTML = '';
        
        reviews.forEach(review => {
            const reviewElement = createReviewElement(review);
            reviewsContainer.appendChild(reviewElement);
        });
        
        reviewsContainer.classList.remove('hidden');
        noReviews.classList.add('hidden');
    }

    // Create review HTML element
    function createReviewElement(review) {
        const reviewDiv = document.createElement('div');
        reviewDiv.className = 'testimonial-card';
        
        const avatarColor = getAvatarColor(review.avatar_color);
        const initials = getInitials(review.user_name);
        const timeAgo = getTimeAgo(review.created_at);
        const stars = generateStarRating(review.rating);
        
        reviewDiv.innerHTML = `
            <div class="flex items-start space-x-4">
                <!-- Avatar -->
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 ${avatarColor} rounded-full flex items-center justify-center">
                        <span class="${getAvatarTextColor(review.avatar_color)} font-semibold text-lg">${initials}</span>
                    </div>
                </div>
                <!-- Review Content -->
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-semibold text-dark-gray-900">${escapeHtml(review.user_name)}</h3>
                        <span class="text-sm text-dark-gray-500">${timeAgo}</span>
                    </div>
                    <!-- Star Rating -->
                    <div class="flex items-center mb-3">
                        <div class="flex star-rating">
                            ${stars}
                        </div>
                    </div>
                    <p class="text-dark-gray-600">${escapeHtml(review.comment)}</p>
                </div>
            </div>
        `;
        
        return reviewDiv;
    }

    // Modal handlers
    addReviewBtn.addEventListener('click', openModal);
    closeModal.addEventListener('click', closeModalHandler);
    cancelReview.addEventListener('click', closeModalHandler);
    
    // Click outside modal to close
    reviewModal.addEventListener('click', function(e) {
        if (e.target === reviewModal) {
            closeModalHandler();
        }
    });

    function openModal() {
        reviewModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModalHandler() {
        reviewModal.classList.add('hidden');
        document.body.style.overflow = 'auto';
        resetForm();
    }

    // Star rating handlers
    starButtons.forEach(button => {
        button.addEventListener('click', function() {
            selectedRating = parseInt(this.dataset.rating);
            ratingInput.value = selectedRating;
            updateStarRating();
        });
        
        button.addEventListener('mouseenter', function() {
            const rating = parseInt(this.dataset.rating);
            highlightStars(rating);
        });
    });
    
    document.getElementById('star-rating').addEventListener('mouseleave', function() {
        updateStarRating();
    });

    function updateStarRating() {
        starButtons.forEach((button, index) => {
            if (index < selectedRating) {
                button.classList.remove('text-gray-300');
                button.classList.add('text-yellow-400');
            } else {
                button.classList.remove('text-yellow-400');
                button.classList.add('text-gray-300');
            }
        });
    }

    function highlightStars(rating) {
        starButtons.forEach((button, index) => {
            if (index < rating) {
                button.classList.remove('text-gray-300');
                button.classList.add('text-yellow-400');
            } else {
                button.classList.remove('text-yellow-400');
                button.classList.add('text-gray-300');
            }
        });
    }

    // Character count
    commentField.addEventListener('input', function() {
        charCount.textContent = this.value.length;
    });

    // Form submission
    reviewForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        if (selectedRating === 0) {
            showError('Por favor selecciona una calificación.');
            return;
        }
        
        const comment = commentField.value.trim();
        if (!comment) {
            showError('Por favor escribe tu reseña.');
            return;
        }
        
        // Show loading state
        const submitBtn = document.getElementById('submit-review');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Submitting...';
        submitBtn.disabled = true;
        
        try {
            const response = await fetch('/api/reviews', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                },
                body: JSON.stringify({
                    rating: selectedRating,
                    comment: comment
                })
            });
            
            const data = await response.json();
            
            if (data.status === 'success') {
                showSuccess(data.message);
                closeModalHandler();
                // Reload reviews and check eligibility
                await loadReviews();
                await checkUserEligibility();
            } else {
                showError(data.message);
            }
        } catch (error) {
            console.error('Error submitting review:', error);
            showError('Ocurrió un error al enviar tu reseña. Por favor intenta nuevamente.');
        } finally {
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }
    });

    // Helper functions
    function showNoReviews() {
        reviewsContainer.classList.add('hidden');
        noReviews.classList.remove('hidden');
    }

    function showSuccess(message) {
        hideMessages();
        document.getElementById('review-success-text').textContent = message;
        reviewSuccess.classList.remove('hidden');
        reviewSuccess.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function showError(message) {
        hideMessages();
        document.getElementById('review-error-text').textContent = message;
        reviewError.classList.remove('hidden');
        reviewError.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function showDemoInfo(message) {
        document.getElementById('demo-info-text').innerHTML = message;
        demoInfo.classList.remove('hidden');
    }

    function hideMessages() {
        reviewSuccess.classList.add('hidden');
        reviewError.classList.add('hidden');
    }

    function resetForm() {
        selectedRating = 0;
        ratingInput.value = '';
        commentField.value = '';
        charCount.textContent = '0';
        updateStarRating();
    }

    function getAvatarColor(color) {
        const colorMap = {
            'orange': 'bg-orange-200',
            'blue': 'bg-blue-200', 
            'green': 'bg-green-200',
            'purple': 'bg-purple-200',
            'red': 'bg-red-200',
            'yellow': 'bg-yellow-200',
            'indigo': 'bg-indigo-200',
            'pink': 'bg-pink-200'
        };
        return colorMap[color] || 'bg-gray-200';
    }

    function getAvatarTextColor(color) {
        const colorMap = {
            'orange': 'text-orange-800',
            'blue': 'text-blue-800',
            'green': 'text-green-800',
            'purple': 'text-purple-800',
            'red': 'text-red-800',
            'yellow': 'text-yellow-800',
            'indigo': 'text-indigo-800',
            'pink': 'text-pink-800'
        };
        return colorMap[color] || 'text-gray-800';
    }

    function getInitials(name) {
        return name.split(' ').map(n => n[0]).join('').toUpperCase();
    }

    function getTimeAgo(dateString) {
        const date = new Date(dateString);
        const now = new Date();
        const diffTime = Math.abs(now - date);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        
        if (diffDays === 1) return '1 day ago';
        if (diffDays < 7) return `${diffDays} days ago`;
        if (diffDays < 14) return '1 week ago';
        if (diffDays < 21) return '2 weeks ago';
        if (diffDays < 28) return '3 weeks ago';
        if (diffDays < 60) return '1 month ago';
        if (diffDays < 120) return '2 months ago';
        return 'a while ago';
    }

    function generateStarRating(rating) {
        let stars = '';
        for (let i = 1; i <= 5; i++) {
            const filled = i <= rating;
            const color = filled ? 'currentColor' : 'currentColor';
            const className = filled ? 'text-yellow-400' : 'text-gray-300';
            stars += `
                <svg class="w-4 h-4 ${className}" fill="${color}" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
            `;
        }
        return stars;
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
});
</script>
@endsection 