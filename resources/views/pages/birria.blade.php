@extends('layouts.app')

@section('title', 'Birria Jalisciense | Restaurante Jalisco')
@section('description', 'Deliciosa birria estilo Jalisco preparada con receta tradicional. El auténtico sabor de la birria jalisciense en cada cucharada.')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-mexican py-20 text-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="font-mexican text-4xl md:text-5xl font-bold mb-4">
            Birria Jalisciense
        </h1>
        <p class="text-xl text-crema-100 max-w-3xl mx-auto">
            La tradición culinaria más representativa de Jalisco, 
            preparada con amor y recetas familiares de generación en generación.
        </p>
    </div>
</section>

<!-- Contenido principal -->
<section class="py-16 bg-crema-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="font-mexican text-3xl font-bold text-terracota-800 mb-8">
                ¡Próximamente en nuestro menú!
            </h2>
            <p class="text-lg text-gray-600 mb-8">
                Estamos perfeccionando nuestra receta de birria para ofrecerte el sabor más auténtico 
                y tradicional de Jalisco. Muy pronto podrás disfrutar de este manjar.
            </p>
            
            <div class="bg-white rounded-xl shadow-mexican p-8 mb-8">
                <h3 class="font-semibold text-xl text-rojo-mexicano-700 mb-4">
                    Mientras tanto, prueba nuestras especialidades
                </h3>
                <p class="text-gray-600 mb-6">
                    No te pierdas nuestras deliciosas tortas ahogadas y otros platillos jaliscienses 
                    que ya están disponibles y te van a encantar.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}" 
                       class="bg-terracota-600 hover:bg-terracota-700 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center justify-center space-x-2">
                        <span>Ver especialidades</span>
                    </a>
                    
                    <a href="{{ route('catenos') }}" 
                       class="btn-mexican text-white px-6 py-3 rounded-full font-semibold shadow-mexican hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center justify-center space-x-2">
                        <span>Hacer pedido</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 