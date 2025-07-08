@extends('layouts.app')

@section('title', 'Sopes Tradicionales | Restaurante Jalisco')
@section('description', 'Deliciosos sopes hechos a mano con masa fresca y los mejores ingredientes. Auténticos antojitos mexicanos de Jalisco.')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-terracota py-20 text-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="font-mexican text-4xl md:text-5xl font-bold mb-4">
            Sopes Tradicionales
        </h1>
        <p class="text-xl text-crema-100 max-w-3xl mx-auto">
            Hechos a mano con masa fresca, frijoles refritos, queso fresco, 
            crema y salsa verde. Los antojitos mexicanos que conquistarán tu paladar.
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
                Estamos preparando nuestros deliciosos sopes hechos con la tradicional técnica artesanal. 
                Masa fresca, ingredientes de primera calidad y todo el sabor de Jalisco.
            </p>
            
            <div class="bg-white rounded-xl shadow-terracota p-8 mb-8">
                <h3 class="font-semibold text-xl text-terracota-700 mb-4">
                    Descubre nuestras especialidades disponibles
                </h3>
                <p class="text-gray-600 mb-6">
                    Mientras perfeccionamos nuestros sopes, te invitamos a probar nuestras famosas 
                    tortas ahogadas y otros platillos que ya están listos para ti.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}" 
                       class="bg-terracota-600 hover:bg-terracota-700 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center justify-center space-x-2">
                        <span>Ver especialidades</span>
                    </a>
                    
                    <a href="{{ route('catenos') }}" 
                       class="btn-mexican text-white px-6 py-3 rounded-full font-semibold shadow-mexican hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center justify-center space-x-2">
                        <span>Contactar</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 