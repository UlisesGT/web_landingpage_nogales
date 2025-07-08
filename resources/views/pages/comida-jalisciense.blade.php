@extends('layouts.app')

@section('title', 'Comida Jalisciense Tradicional | Restaurante Jalisco')
@section('description', 'Auténtica comida jalisciense: tortas ahogadas, pozole, tamales y más platillos tradicionales de Jalisco preparados con recetas familiares.')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-mexican py-20 text-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="font-mexican text-4xl md:text-5xl font-bold mb-4">
            Comida Jalisciense Tradicional
        </h1>
        <p class="text-xl text-crema-100 max-w-3xl mx-auto">
            Los sabores auténticos de Jalisco en cada platillo. 
            Tortas ahogadas, pozole, tamales y más delicias tradicionales.
        </p>
    </div>
</section>

<!-- Sección de Tortas Ahogadas -->
<section class="py-16 bg-crema-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Tortas Ahogadas - Especialidad disponible -->
            <div class="bg-white rounded-xl shadow-mexican p-8 mb-12">
                <div class="text-center mb-8">
                    <span class="bg-rojo-mexicano-600 text-white px-4 py-2 rounded-full text-sm font-semibold">
                        ¡Especialidad de la Casa!
                    </span>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <div>
                        <h2 class="font-mexican text-3xl font-bold text-terracota-800 mb-4">
                            Tortas Ahogadas
                        </h2>
                        <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                            La especialidad tapatía por excelencia. Crujiente birote bañado en salsa de tomate 
                            picante y chile de árbol, con frijoles refritos y carnitas doraditas. 
                            Un verdadero manjar jalisciense que no puedes dejar de probar.
                        </p>
                        
                        <div class="space-y-3 text-gray-700 mb-6">
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-rojo-mexicano-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span>Birote crujiente y fresco</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-rojo-mexicano-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span>Carnitas doraditas de primera calidad</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-rojo-mexicano-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span>Salsa de tomate picante tradicional</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-rojo-mexicano-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span>Frijoles refritos caseros</span>
                            </div>
                        </div>
                        
                        <a href="{{ route('catenos') }}" 
                           class="btn-mexican text-white px-6 py-3 rounded-full font-semibold shadow-mexican hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center space-x-2">
                            <span>¡Quiero ordenar!</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </div>
                    
                    <!-- Imagen placeholder -->
                    <div class="relative">
                        <div class="bg-gradient-to-br from-rojo-mexicano-400 to-rojo-mexicano-600 rounded-xl h-64 flex items-center justify-center">
                            <div class="text-white opacity-30">
                                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M2 12C2 6.48 6.48 2 12 2s10 4.48 10 10-4.48 10-10 10S2 17.52 2 12zm4.64-1.96l3.54 3.54 7.07-7.07 1.41 1.41L9.9 16.69 4.93 11.72l1.41-1.41l.3.33z"/>
                                </svg>
                            </div>
                        </div>
                        <!-- Efecto de vapor -->
                        <div class="absolute top-4 left-1/2 transform -translate-x-1/2">
                            <div class="steam-animation opacity-50">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2L13.5 8.5H21L15.5 12.5L17 19L12 15L7 19L8.5 12.5L3 8.5H10.5L12 2Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Otros platillos próximamente -->
            <div class="text-center">
                <h2 class="font-mexican text-3xl font-bold text-terracota-800 mb-8">
                    Más Delicias Jaliscienses
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Pozole -->
                    <div class="bg-white rounded-xl shadow-terracota p-6 opacity-75">
                        <div class="bg-terracota-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-terracota-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L13.5 8.5H21L15.5 12.5L17 19L12 15L7 19L8.5 12.5L3 8.5H10.5L12 2Z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg text-terracota-800 mb-2">Pozole Rojo</h3>
                        <p class="text-gray-600 text-sm">Próximamente</p>
                    </div>
                    
                    <!-- Tamales -->
                    <div class="bg-white rounded-xl shadow-terracota p-6 opacity-75">
                        <div class="bg-terracota-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-terracota-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L13.5 8.5H21L15.5 12.5L17 19L12 15L7 19L8.5 12.5L3 8.5H10.5L12 2Z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg text-terracota-800 mb-2">Tamales Caseros</h3>
                        <p class="text-gray-600 text-sm">Próximamente</p>
                    </div>
                    
                    <!-- Quesadillas -->
                    <div class="bg-white rounded-xl shadow-terracota p-6 opacity-75">
                        <div class="bg-terracota-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-terracota-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L13.5 8.5H21L15.5 12.5L17 19L12 15L7 19L8.5 12.5L3 8.5H10.5L12 2Z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-lg text-terracota-800 mb-2">Quesadillas</h3>
                        <p class="text-gray-600 text-sm">Próximamente</p>
                    </div>
                </div>
                
                <p class="mt-8 text-gray-600">
                    Estamos ampliando nuestro menú para ofrecerte más sabores auténticos de Jalisco. 
                    ¡Mantente al pendiente!
                </p>
            </div>
        </div>
    </div>
</section>
@endsection 