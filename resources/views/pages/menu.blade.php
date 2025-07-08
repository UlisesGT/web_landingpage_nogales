@extends('layouts.app')

@section('title', 'Menu - Casa Jalisco')
@section('description', 'Discover our authentic Mexican menu featuring traditional dishes from Jalisco including birria, tortas ahogadas, and more.')

@section('content')
<!-- Menu Hero Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-6xl font-bold text-dark-gray-900 mb-6">
            Our Menu
        </h1>
        <p class="text-lg md:text-xl text-dark-gray-600 max-w-3xl mx-auto leading-relaxed">
            Discover the authentic flavors of Jalisco with our traditional recipes passed down through generations.
        </p>
    </div>
</section>

<!-- Featured Specialties -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h2 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-12">Featured Specialties</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        <!-- Birria Tacos -->
        <div class="bg-white rounded-2xl shadow-card overflow-hidden">
            <div class="h-64 bg-gradient-to-br from-red-900 via-red-800 to-orange-700 relative">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-32 h-32 bg-orange-400 rounded-full opacity-20"></div>
                </div>
                <div class="absolute bottom-6 left-6 right-6">
                    <div class="bg-yellow-600 h-8 rounded-lg opacity-80 mb-2"></div>
                    <div class="bg-red-700 h-6 rounded-lg opacity-70"></div>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-dark-gray-900 mb-2">Birria Tacos</h3>
                <p class="text-dark-gray-600 mb-4">Slow-cooked beef tacos with rich consommé for dipping</p>
                <div class="flex justify-between items-center">
                    <span class="text-2xl font-bold text-orange-600">$15.99</span>
                    <a href="{{ route('order-online') }}" class="btn-primary px-4 py-2 text-sm">Order Now</a>
                </div>
            </div>
        </div>

        <!-- Tortas Ahogadas -->
        <div class="bg-white rounded-2xl shadow-card overflow-hidden">
            <div class="h-64 bg-gradient-to-br from-yellow-800 via-orange-600 to-red-600 relative">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-40 h-20 bg-yellow-200 rounded-lg opacity-90 shadow-lg"></div>
                </div>
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
                    <div class="w-2 h-12 bg-red-600 rounded-full opacity-80"></div>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-dark-gray-900 mb-2">Tortas Ahogadas</h3>
                <p class="text-dark-gray-600 mb-4">Traditional sandwich drowned in spicy tomato sauce</p>
                <div class="flex justify-between items-center">
                    <span class="text-2xl font-bold text-orange-600">$12.99</span>
                    <a href="{{ route('order-online') }}" class="btn-primary px-4 py-2 text-sm">Order Now</a>
                </div>
            </div>
        </div>

        <!-- Carne Asada -->
        <div class="bg-white rounded-2xl shadow-card overflow-hidden">
            <div class="h-64 bg-gradient-to-br from-gray-800 via-red-900 to-orange-800 relative">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-36 h-24 bg-red-800 rounded-lg opacity-90 shadow-lg"></div>
                </div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <div class="w-32 h-1 bg-black opacity-40 mb-2"></div>
                    <div class="w-32 h-1 bg-black opacity-40 mb-2"></div>
                    <div class="w-32 h-1 bg-black opacity-40"></div>
                </div>
                <div class="absolute bottom-4 right-4">
                    <div class="w-8 h-8 bg-green-500 rounded-full opacity-70"></div>
                    <div class="w-6 h-6 bg-red-500 rounded-full opacity-70 ml-2"></div>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-dark-gray-900 mb-2">Carne Asada</h3>
                <p class="text-dark-gray-600 mb-4">Grilled marinated beef with traditional sides</p>
                <div class="flex justify-between items-center">
                    <span class="text-2xl font-bold text-orange-600">$18.99</span>
                    <a href="{{ route('order-online') }}" class="btn-primary px-4 py-2 text-sm">Order Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Menu Categories -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h2 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-12">Menu Categories</h2>
    
    <!-- Tacos Section -->
    <div class="mb-16">
        <h3 class="text-2xl font-bold text-dark-gray-900 mb-8">Tacos</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-card p-6">
                <h4 class="text-lg font-semibold text-dark-gray-900 mb-2">Tacos de Birria</h4>
                <p class="text-dark-gray-600 text-sm mb-3">Slow-cooked beef with consommé</p>
                <div class="flex justify-between items-center">
                    <span class="text-xl font-bold text-orange-600">$15.99</span>
                    <span class="text-sm text-dark-gray-500">3 tacos</span>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-card p-6">
                <h4 class="text-lg font-semibold text-dark-gray-900 mb-2">Tacos de Carnitas</h4>
                <p class="text-dark-gray-600 text-sm mb-3">Traditional slow-cooked pork</p>
                <div class="flex justify-between items-center">
                    <span class="text-xl font-bold text-orange-600">$13.99</span>
                    <span class="text-sm text-dark-gray-500">3 tacos</span>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-card p-6">
                <h4 class="text-lg font-semibold text-dark-gray-900 mb-2">Tacos de Pollo</h4>
                <p class="text-dark-gray-600 text-sm mb-3">Grilled chicken with spices</p>
                <div class="flex justify-between items-center">
                    <span class="text-xl font-bold text-orange-600">$12.99</span>
                    <span class="text-sm text-dark-gray-500">3 tacos</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Tortas Section -->
    <div class="mb-16">
        <h3 class="text-2xl font-bold text-dark-gray-900 mb-8">Tortas</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-card p-6">
                <h4 class="text-lg font-semibold text-dark-gray-900 mb-2">Torta Ahogada</h4>
                <p class="text-dark-gray-600 text-sm mb-3">Drowned sandwich with spicy sauce</p>
                <div class="flex justify-between items-center">
                    <span class="text-xl font-bold text-orange-600">$12.99</span>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-card p-6">
                <h4 class="text-lg font-semibold text-dark-gray-900 mb-2">Torta de Carnitas</h4>
                <p class="text-dark-gray-600 text-sm mb-3">Pork sandwich with refried beans</p>
                <div class="flex justify-between items-center">
                    <span class="text-xl font-bold text-orange-600">$11.99</span>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-card p-6">
                <h4 class="text-lg font-semibold text-dark-gray-900 mb-2">Torta de Pollo</h4>
                <p class="text-dark-gray-600 text-sm mb-3">Grilled chicken sandwich</p>
                <div class="flex justify-between items-center">
                    <span class="text-xl font-bold text-orange-600">$10.99</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Entrees Section -->
    <div class="mb-16">
        <h3 class="text-2xl font-bold text-dark-gray-900 mb-8">Entrees</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-card p-6">
                <h4 class="text-lg font-semibold text-dark-gray-900 mb-2">Carne Asada</h4>
                <p class="text-dark-gray-600 text-sm mb-3">Grilled marinated beef with sides</p>
                <div class="flex justify-between items-center">
                    <span class="text-xl font-bold text-orange-600">$18.99</span>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-card p-6">
                <h4 class="text-lg font-semibold text-dark-gray-900 mb-2">Pozole Rojo</h4>
                <p class="text-dark-gray-600 text-sm mb-3">Traditional hominy soup</p>
                <div class="flex justify-between items-center">
                    <span class="text-xl font-bold text-orange-600">$14.99</span>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-card p-6">
                <h4 class="text-lg font-semibold text-dark-gray-900 mb-2">Chiles Rellenos</h4>
                <p class="text-dark-gray-600 text-sm mb-3">Stuffed poblano peppers</p>
                <div class="flex justify-between items-center">
                    <span class="text-xl font-bold text-orange-600">$16.99</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Drinks Section -->
    <div class="mb-16">
        <h3 class="text-2xl font-bold text-dark-gray-900 mb-8">Beverages</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-lg shadow-card p-6">
                <h4 class="text-lg font-semibold text-dark-gray-900 mb-2">Horchata</h4>
                <p class="text-dark-gray-600 text-sm mb-3">Traditional rice drink</p>
                <span class="text-xl font-bold text-orange-600">$4.99</span>
            </div>
            
            <div class="bg-white rounded-lg shadow-card p-6">
                <h4 class="text-lg font-semibold text-dark-gray-900 mb-2">Agua Fresca</h4>
                <p class="text-dark-gray-600 text-sm mb-3">Fresh fruit water</p>
                <span class="text-xl font-bold text-orange-600">$3.99</span>
            </div>
            
            <div class="bg-white rounded-lg shadow-card p-6">
                <h4 class="text-lg font-semibold text-dark-gray-900 mb-2">Mexican Coke</h4>
                <p class="text-dark-gray-600 text-sm mb-3">Glass bottle Coca-Cola</p>
                <span class="text-xl font-bold text-orange-600">$2.99</span>
            </div>
            
            <div class="bg-white rounded-lg shadow-card p-6">
                <h4 class="text-lg font-semibold text-dark-gray-900 mb-2">Café de Olla</h4>
                <p class="text-dark-gray-600 text-sm mb-3">Traditional spiced coffee</p>
                <span class="text-xl font-bold text-orange-600">$3.99</span>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="bg-gradient-to-r from-orange-500 to-red-600 rounded-2xl p-12 text-center text-white">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Order?</h2>
        <p class="text-lg md:text-xl mb-8 opacity-90">
            Experience the authentic flavors of Jalisco today!
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('order-online') }}" class="bg-white text-orange-600 hover:bg-gray-100 font-semibold py-3 px-8 rounded-lg transition-colors duration-200">
                Order Online
            </a>
            <a href="{{ route('contact') }}" class="border-2 border-white text-white hover:bg-white hover:text-orange-600 font-semibold py-3 px-8 rounded-lg transition-colors duration-200">
                Call Us: (555) 123-4567
            </a>
        </div>
    </div>
</section>
@endsection 