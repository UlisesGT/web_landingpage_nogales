{{-- Componente de tarjeta de producto reutilizable --}}
@props([
    'title' => '',
    'description' => '',
    'image' => '',
    'icon' => 'corn',
    'href' => '#',
    'featured' => false
])

<div class="card-hover fade-on-scroll bg-white rounded-xl shadow-terracota overflow-hidden {{ $featured ? 'ring-2 ring-rojo-mexicano-500 ring-opacity-50' : '' }}">
    {{-- Imagen de la tarjeta --}}
    <div class="relative h-48 overflow-hidden bg-gradient-terracota">
        @if($image)
            <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
        @else
            {{-- Imagen placeholder con patrón mexicano --}}
            <div class="w-full h-full bg-gradient-to-br from-terracota-400 to-terracota-600 flex items-center justify-center">
                <div class="text-white opacity-30">
                    <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24">
                        @if($icon === 'corn')
                            <path d="M12 2L13.5 8.5H21L15.5 12.5L17 19L12 15L7 19L8.5 12.5L3 8.5H10.5L12 2Z"/>
                        @elseif($icon === 'taco')
                            <path d="M2 12C2 6.48 6.48 2 12 2s10 4.48 10 10-4.48 10-10 10S2 17.52 2 12zm4.64-1.96l3.54 3.54 7.07-7.07 1.41 1.41L9.9 16.69 4.93 11.72l1.41-1.41l.3.33z"/>
                        @elseif($icon === 'plate')
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM8 17.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zM12 13c-1.38 0-2.5-1.12-2.5-2.5S10.62 8 12 8s2.5 1.12 2.5 2.5S13.38 13 12 13zm4 4.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        @else
                            <path d="M12 2L13.5 8.5H21L15.5 12.5L17 19L12 15L7 19L8.5 12.5L3 8.5H10.5L12 2Z"/>
                        @endif
                    </svg>
                </div>
            </div>
        @endif
        
        {{-- Overlay con degradado --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
        
        {{-- Badge de destacado --}}
        @if($featured)
            <div class="absolute top-4 right-4">
                <span class="bg-rojo-mexicano-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                    ¡Especialidad!
                </span>
            </div>
        @endif
    </div>

    {{-- Contenido de la tarjeta --}}
    <div class="p-6">
        {{-- Ícono decorativo y título --}}
        <div class="flex items-start space-x-3 mb-3">
            <div class="flex-shrink-0 bg-crema-200 rounded-full p-2">
                <svg class="w-5 h-5 text-terracota-600" fill="currentColor" viewBox="0 0 24 24">
                    @if($icon === 'corn')
                        {{-- Ícono de mazorca --}}
                        <path d="M12 2L13.5 8.5H21L15.5 12.5L17 19L12 15L7 19L8.5 12.5L3 8.5H10.5L12 2Z"/>
                    @elseif($icon === 'taco')
                        {{-- Ícono de taco --}}
                        <path d="M2 12C2 6.48 6.48 2 12 2s10 4.48 10 10-4.48 10-10 10S2 17.52 2 12zm4.64-1.96l3.54 3.54 7.07-7.07 1.41 1.41L9.9 16.69 4.93 11.72l1.41-1.41l.3.33z"/>
                    @elseif($icon === 'plate')
                        {{-- Ícono de plato --}}
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM8 17.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zM12 13c-1.38 0-2.5-1.12-2.5-2.5S10.62 8 12 8s2.5 1.12 2.5 2.5S13.38 13 12 13zm4 4.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                    @else
                        {{-- Ícono por defecto --}}
                        <path d="M12 2L13.5 8.5H21L15.5 12.5L17 19L12 15L7 19L8.5 12.5L3 8.5H10.5L12 2Z"/>
                    @endif
                </svg>
            </div>
            <div class="flex-1">
                <h3 class="font-mexican text-xl font-semibold text-terracota-800 mb-2">
                    {{ $title }}
                </h3>
            </div>
        </div>

        {{-- Descripción --}}
        <p class="text-gray-600 text-sm leading-relaxed mb-4">
            {{ $description }}
        </p>

        {{-- Botón de acción --}}
        <div class="flex justify-between items-center">
            <a href="{{ $href }}" 
               class="inline-flex items-center space-x-2 text-terracota-600 hover:text-terracota-700 font-medium text-sm transition-colors duration-300 group">
                <span>Ver más</span>
                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
            
            {{-- Precio o etiqueta adicional --}}
            {{ $slot }}
        </div>
    </div>
    
    {{-- Efecto de vapor decorativo (solo para tarjetas destacadas) --}}
    @if($featured)
        <div class="absolute top-2 left-1/2 transform -translate-x-1/2">
            <div class="steam-animation opacity-30">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L13.5 8.5H21L15.5 12.5L17 19L12 15L7 19L8.5 12.5L3 8.5H10.5L12 2Z"/>
                </svg>
            </div>
        </div>
    @endif
</div> 