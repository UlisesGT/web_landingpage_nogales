@extends('layouts.app')

@section('title', 'Forgot Password - Jalisco Flavors')
@section('description', 'Reset your password for Jalisco Flavors account. Enter your email to receive a password reset link.')

@section('content')
<!-- Forgot Password Section -->
<section class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-md w-full space-y-8">
        <!-- Header -->
        <div class="text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-6">
                Forgot your password?
            </h1>
            <p class="text-lg text-dark-gray-600 leading-relaxed max-w-lg mx-auto">
                Enter the email address associated with your account and we'll send you a link to reset your password.
            </p>
        </div>

        <!-- Forgot Password Form -->
        <form class="space-y-6 mt-12" id="forgot-password-form">
            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-dark-gray-700 mb-2">
                    Email
                </label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200 text-dark-gray-900 placeholder-gray-400"
                    placeholder="Enter your email">
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button 
                    type="submit"
                    id="submit-btn"
                    class="w-full bg-orange-200 hover:bg-orange-300 text-dark-gray-800 font-semibold py-3 px-4 rounded-2xl transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                    Submit
                </button>
            </div>
        </form>

        <!-- Back to Login Link -->
        <div class="text-center mt-8">
            <a href="{{ route('login') }}" class="text-orange-500 hover:text-orange-600 font-medium transition-colors duration-200">
                ← Back to Login
            </a>
        </div>

        <!-- Success Message -->
        <div id="success-message" class="hidden mt-6 p-4 bg-green-50 border border-green-200 rounded-lg">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <p class="text-green-800" id="success-text"></p>
            </div>
        </div>

        <!-- Error Message -->
        <div id="error-message" class="hidden mt-6 p-4 bg-red-50 border border-red-200 rounded-lg">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-red-800" id="error-text"></p>
            </div>
        </div>

        <!-- Demo Info -->
        <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-lg">
            <div class="flex items-start">
                <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <h4 class="text-sm font-semibold text-blue-800 mb-1">Demo Information</h4>
                    <p class="text-sm text-blue-700">
                        Para probar la funcionalidad, usa emails como: 
                        <code class="bg-blue-100 px-1 rounded">test@example.com</code>, 
                        <code class="bg-blue-100 px-1 rounded">user@jaliscoflavors.com</code>, 
                        o cualquier email que contenga "jalisco".
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const forgotPasswordForm = document.getElementById('forgot-password-form');
    const submitBtn = document.getElementById('submit-btn');
    const successMessage = document.getElementById('success-message');
    const errorMessage = document.getElementById('error-message');
    const successText = document.getElementById('success-text');
    const errorText = document.getElementById('error-text');
    
    forgotPasswordForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = document.getElementById('email').value;
        
        if (!email) {
            showError('Por favor ingresa tu dirección de correo electrónico.');
            return;
        }
        
        // Show loading state
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Sending...';
        submitBtn.disabled = true;
        
        // Hide previous messages
        hideMessages();
        
        // Make API call to send reset link
        fetch('/forgot-password', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
            },
            body: JSON.stringify({ email: email })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                showSuccess(data.message);
                // Para la demo, mostrar el enlace de reset
                if (data.token) {
                    setTimeout(() => {
                        const resetUrl = `/reset-password/${data.token}?email=${encodeURIComponent(email)}`;
                        showSuccess(`${data.message}<br><br><strong>Demo:</strong> <a href="${resetUrl}" class="underline text-blue-600">Haz clic aquí para restablecer tu contraseña</a>`);
                    }, 1000);
                }
            } else {
                showError(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showError('Ocurrió un error al enviar el enlace de restablecimiento. Por favor intenta nuevamente.');
        })
        .finally(() => {
            // Reset button state
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        });
    });
    
    function showSuccess(message) {
        hideMessages();
        successText.innerHTML = message;
        successMessage.classList.remove('hidden');
        successMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
    
    function showError(message) {
        hideMessages();
        errorText.textContent = message;
        errorMessage.classList.remove('hidden');
        errorMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
    
    function hideMessages() {
        successMessage.classList.add('hidden');
        errorMessage.classList.add('hidden');
    }
});
</script>
@endsection 