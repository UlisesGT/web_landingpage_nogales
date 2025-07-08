@extends('layouts.app')

@section('title', 'Login - El Sabor de Jalisco')
@section('description', 'Login to your El Sabor de Jalisco account to manage your orders and preferences.')

@section('content')
<!-- Login Section -->
<section class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-md w-full space-y-8">
        <!-- Header -->
        <div class="text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-8">
                Login to Your Account
            </h1>
        </div>

        <!-- Login Form -->
        <form class="space-y-6" id="login-form">
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

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-dark-gray-700 mb-2">
                    Password
                </label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200 text-dark-gray-900 placeholder-gray-400"
                    placeholder="Enter your password">
            </div>

            <!-- Forgot Password Link -->
            <div class="text-left">
                <a href="{{ route('forgot-password') }}" class="text-dark-gray-600 hover:text-orange-500 text-sm transition-colors duration-200">
                    Forgot Password?
                </a>
            </div>

            <!-- Login Button -->
            <div>
                <button 
                    type="submit"
                    class="w-full bg-orange-200 hover:bg-orange-300 text-dark-gray-800 font-semibold py-3 px-4 rounded-2xl transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                    Login
                </button>
            </div>
        </form>

        <!-- Social Login Section -->
        <div class="mt-8">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-gray-50 text-dark-gray-600">Or login with</span>
                </div>
            </div>

            <!-- Social Buttons -->
            <div class="mt-6 grid grid-cols-2 gap-4">
                <!-- Google Button -->
                <button class="w-full bg-gray-200 hover:bg-gray-300 text-dark-gray-700 font-medium py-3 px-4 rounded-2xl transition-colors duration-200 flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                    <span>Google</span>
                </button>

                <!-- Facebook Button -->
                <button class="w-full bg-gray-200 hover:bg-gray-300 text-dark-gray-700 font-medium py-3 px-4 rounded-2xl transition-colors duration-200 flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="#1877F2" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                    <span>Facebook</span>
                </button>
            </div>
        </div>

        <!-- Sign Up Link -->
        <div class="text-center mt-8">
            <p class="text-dark-gray-600">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-orange-500 hover:text-orange-600 font-medium transition-colors duration-200">
                    Create Account
                </a>
            </p>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('login-form');
    
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        
        if (!email || !password) {
            alert('Please fill in all fields');
            return;
        }
        
        // Simulate login process
        const submitButton = document.querySelector('button[type="submit"]');
        const originalText = submitButton.textContent;
        
        submitButton.textContent = 'Logging in...';
        submitButton.disabled = true;
        
        setTimeout(async () => {
            // Simulate successful login and save user session
            const userName = getNameFromEmail(email);
            
            try {
                // Save user session for reviews system
                await fetch('/api/save-user-session', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    body: JSON.stringify({
                        email: email,
                        name: userName
                    })
                });
                
                alert(`¡Bienvenido ${userName}! Login exitoso.`);
                
                // Redirect to home page after login
                window.location.href = '/';
            } catch (error) {
                console.error('Error saving user session:', error);
                alert('Login exitoso, pero ocurrió un error al configurar la sesión.');
                window.location.href = '/';
            } finally {
                submitButton.textContent = originalText;
                submitButton.disabled = false;
            }
        }, 2000);
    });
    
    // Helper function to generate name from email
    function getNameFromEmail(email) {
        const username = email.split('@')[0];
        // Convert to proper case
        return username.charAt(0).toUpperCase() + username.slice(1).toLowerCase();
    }
});
</script>
@endsection 