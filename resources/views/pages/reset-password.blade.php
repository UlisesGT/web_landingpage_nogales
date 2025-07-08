@extends('layouts.app')

@section('title', 'Reset Password - Jalisco Flavors')
@section('description', 'Create a new password for your Jalisco Flavors account.')

@section('content')
<!-- Reset Password Section -->
<section class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-md w-full space-y-8">
        <!-- Header -->
        <div class="text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-6">
                Reset your password
            </h1>
            <p class="text-lg text-dark-gray-600 leading-relaxed">
                Enter your new password below to complete the reset process.
            </p>
        </div>

        <!-- Reset Password Form -->
        <form class="space-y-6 mt-12" id="reset-password-form">
            <!-- Hidden fields -->
            <input type="hidden" id="token" name="token" value="{{ $token ?? '' }}">
            <input type="hidden" id="email" name="email" value="{{ request('email') }}">

            <!-- Email Display (read-only) -->
            <div>
                <label class="block text-sm font-medium text-dark-gray-700 mb-2">
                    Email
                </label>
                <input 
                    type="email" 
                    value="{{ request('email') }}"
                    readonly
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-dark-gray-600">
            </div>

            <!-- New Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-dark-gray-700 mb-2">
                    New Password
                </label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required
                    minlength="8"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200 text-dark-gray-900 placeholder-gray-400"
                    placeholder="Enter your new password (min. 8 characters)">
            </div>

            <!-- Confirm Password Field -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-dark-gray-700 mb-2">
                    Confirm New Password
                </label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    required
                    minlength="8"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200 text-dark-gray-900 placeholder-gray-400"
                    placeholder="Confirm your new password">
            </div>

            <!-- Password Requirements -->
            <div class="text-sm text-dark-gray-600">
                <p class="mb-2">Your password must contain:</p>
                <ul class="list-disc list-inside space-y-1">
                    <li>At least 8 characters</li>
                    <li>Mix of letters and numbers recommended</li>
                </ul>
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button 
                    type="submit"
                    id="submit-btn"
                    class="w-full bg-orange-200 hover:bg-orange-300 text-dark-gray-800 font-semibold py-3 px-4 rounded-2xl transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                    Reset Password
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
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const resetPasswordForm = document.getElementById('reset-password-form');
    const submitBtn = document.getElementById('submit-btn');
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('password_confirmation');
    const successMessage = document.getElementById('success-message');
    const errorMessage = document.getElementById('error-message');
    const successText = document.getElementById('success-text');
    const errorText = document.getElementById('error-text');
    
    // Validate that we have required URL parameters
    const token = document.getElementById('token').value;
    const email = document.getElementById('email').value;
    
    if (!token || !email) {
        showError('El enlace de restablecimiento es inválido o ha expirado. Por favor solicita un nuevo enlace.');
        submitBtn.disabled = true;
        return;
    }
    
    // Real-time password confirmation validation
    function validatePasswordMatch() {
        if (confirmPasswordField.value && passwordField.value !== confirmPasswordField.value) {
            confirmPasswordField.setCustomValidity('Las contraseñas no coinciden');
            confirmPasswordField.classList.add('border-red-500');
            confirmPasswordField.classList.remove('border-gray-300');
        } else {
            confirmPasswordField.setCustomValidity('');
            confirmPasswordField.classList.remove('border-red-500');
            confirmPasswordField.classList.add('border-gray-300');
        }
    }
    
    passwordField.addEventListener('input', validatePasswordMatch);
    confirmPasswordField.addEventListener('input', validatePasswordMatch);
    
    resetPasswordForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const password = passwordField.value;
        const passwordConfirmation = confirmPasswordField.value;
        
        // Client-side validation
        if (!password || !passwordConfirmation) {
            showError('Por favor completa todos los campos.');
            return;
        }
        
        if (password.length < 8) {
            showError('La contraseña debe tener al menos 8 caracteres.');
            return;
        }
        
        if (password !== passwordConfirmation) {
            showError('Las contraseñas no coinciden.');
            return;
        }
        
        // Show loading state
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Resetting...';
        submitBtn.disabled = true;
        
        // Hide previous messages
        hideMessages();
        
        // Make API call to reset password
        fetch('/reset-password', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
            },
            body: JSON.stringify({
                token: token,
                email: email,
                password: password,
                password_confirmation: passwordConfirmation
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                showSuccess(data.message);
                // Redirect to login after 3 seconds
                setTimeout(() => {
                    window.location.href = '/login';
                }, 3000);
            } else {
                showError(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showError('Ocurrió un error al restablecer la contraseña. Por favor intenta nuevamente.');
        })
        .finally(() => {
            // Reset button state
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        });
    });
    
    function showSuccess(message) {
        hideMessages();
        successText.innerHTML = message + '<br><br>Serás redirigido al login en unos segundos...';
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