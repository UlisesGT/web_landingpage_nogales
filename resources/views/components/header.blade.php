<!-- Header moderno estilo Casa Jalisco -->
<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <!-- Icono del logo -->
                    <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.1 13.34l2.83-2.83L3.91 3.5c-1.56 1.56-1.56 4.09 0 5.66l4.19 4.18zm6.78-1.81c1.53.71 3.68.21 5.27-1.38 1.91-1.91 2.28-4.65.81-6.12-1.46-1.46-4.20-1.10-6.12.81-1.59 1.59-2.09 3.74-1.38 5.27L3.7 19.87l1.41 1.41L12 14.41l6.88 6.88 1.41-1.41L13.41 13l1.47-1.47z"/>
                        </svg>
                    </div>
                    <!-- Texto del logo -->
                    <span class="text-xl font-bold text-dark-gray-900">Tacos Gorditas Nogales</span>
                </a>
            </div>

            <!-- Navegación desktop -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('menu') }}" class="nav-link">Menú</a>
                <a href="{{ route('order-online') }}" class="nav-link">Ordenar en Línea</a>
                <a href="{{ route('catering') }}" class="nav-link">Categorias</a>
                <a href="{{ route('about') }}" class="nav-link">Quienes Somos</a>
                <a href="{{ route('login') }}" class="nav-link">Iniciar Sesión</a>
            </nav>

            <!-- Botón menú móvil -->
            <div class="md:hidden">
                <button type="button" id="mobile-menu-button" class="text-dark-gray-500 hover:text-dark-gray-900 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Menú móvil -->
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t border-gray-200">
                <a href="{{ route('menu') }}" class="block px-3 py-2 text-dark-gray-600 hover:text-dark-gray-900">Menu</a>
                <a href="{{ route('order-online') }}" class="block px-3 py-2 text-dark-gray-600 hover:text-dark-gray-900">Order Online</a>
                <a href="{{ route('catering') }}" class="block px-3 py-2 text-dark-gray-600 hover:text-dark-gray-900">Catering</a>
                <a href="{{ route('about') }}" class="block px-3 py-2 text-dark-gray-600 hover:text-dark-gray-900">About Us</a>
                <a href="{{ route('login') }}" class="block px-3 py-2 text-dark-gray-600 hover:text-dark-gray-900">Log In</a>
            </div>
        </div>
    </div>
</header>

<script>
    // Toggle mobile menu
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }
    });
</script> 