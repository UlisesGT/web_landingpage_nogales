<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description', 'Restaurante de comida tradicional mexicana en Jalisco. Especialistas en birria, tortas ahogadas, sopes y catering.')">
    <meta name="keywords" content="restaurtante, tacos, gorditas, nogales, comida, jalisciense, lonches, antojitos mexicanos">
    <meta name="author" content="Tacos Gorditas Nogales">
    
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'Restaurante Jalisco - Auténtico Sazón Mexicano')">
    <meta property="og:description" content="@yield('description', 'El auténtico sazón de Jalisco, directo a tu antojo. Especialistas en birria, tortas ahogadas y antojitos mexicanos.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    
    <title>@yield('title', 'Tacos Gorditas Nogales - Orgullasamente Jaliscense')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Preconnect para optimización de imágenes -->
    <link rel="preconnect" href="https://images.unsplash.com">
    <link rel="preconnect" href="https://cdn.pixabay.com">
    
    <!-- Fonts preload para mejor rendimiento -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Preload de imagen crítica del hero -->
    <link rel="preload" as="image" href="https://images.unsplash.com/1600x900/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&q=80&w=1600&h=900&fit=crop" media="(min-width: 768px)">
    <link rel="preload" as="image" href="https://images.unsplash.com/800x600/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&q=80&w=800&h=600&fit=crop" media="(max-width: 767px)">
    
    <!-- Meta tags para optimización de imágenes -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="https://images.unsplash.com/1200x630/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&q=85&w=1200&h=630&fit=crop">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/jpeg">
    
    <!-- Estilos -->
    @vite(['resources/css/app.css', 'resources/js/main.tsx'])
    
    <!-- Styles adicionales -->
    @stack('styles')
</head>
<body class="font-body bg-crema-50 text-gray-800 antialiased">
    <!-- React App Root -->
    <div id="app"></div>
    
    <!-- Scripts adicionales -->
    @stack('scripts')
    
    <!-- Script para efectos de scroll y animaciones -->
    <script>
        // Animación suave para enlaces del menú
        document.addEventListener('DOMContentLoaded', function() {
            // Efecto de hover en tarjetas
            const cards = document.querySelectorAll('.card-hover');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            // Animación de aparición en scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');
                    }
                });
            }, observerOptions);
            
            // Observar elementos con la clase 'fade-on-scroll'
            document.querySelectorAll('.fade-on-scroll').forEach(el => {
                observer.observe(el);
            });
        });
        
        // Menú móvil toggle
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            const hamburger = document.getElementById('hamburger');
            
            mobileMenu.classList.toggle('hidden');
            hamburger.classList.toggle('active');
        }
    </script>
</body>
</html> 