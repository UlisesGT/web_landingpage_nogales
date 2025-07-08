@extends('layouts.app')

@section('title', 'Catering - Casa Jalisco')
@section('description', 'Casa Jalisco catering services for events, parties, and special occasions. Authentic Mexican cuisine for your next gathering.')

@section('content')
<!-- Catering Hero Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="relative bg-gradient-to-r from-orange-600 via-red-600 to-orange-700 rounded-2xl overflow-hidden h-96 md:h-[450px]">
        <!-- Background pattern -->
        <div class="absolute inset-0" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('data:image/svg+xml,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 1000 600&quot;><rect width=&quot;100%&quot; height=&quot;100%&quot; fill=&quot;%23dc2626&quot;/><circle cx=&quot;150&quot; cy=&quot;150&quot; r=&quot;60&quot; fill=&quot;%23ea580c&quot; opacity=&quot;0.4&quot;/><circle cx=&quot;350&quot; cy=&quot;100&quot; r=&quot;40&quot; fill=&quot;%23ea580c&quot; opacity=&quot;0.3&quot;/><circle cx=&quot;550&quot; cy=&quot;180&quot; r=&quot;70&quot; fill=&quot;%23ea580c&quot; opacity=&quot;0.4&quot;/><circle cx=&quot;750&quot; cy=&quot;120&quot; r=&quot;50&quot; fill=&quot;%23ea580c&quot; opacity=&quot;0.3&quot;/><circle cx=&quot;850&quot; cy=&quot;200&quot; r=&quot;45&quot; fill=&quot;%23ea580c&quot; opacity=&quot;0.4&quot;/></svg>'); background-size: cover; background-position: center;"></div>
        
        <!-- Hero Content -->
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white px-6">
            <div class="max-w-4xl">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Catering Services
                </h1>
                <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto leading-relaxed opacity-90">
                    Bring the authentic flavors of Jalisco to your next event. Perfect for weddings, corporate events, parties, and special occasions.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#packages" class="btn-primary bg-white text-orange-600 hover:bg-gray-100 text-lg px-8 py-3">
                        View Packages
                    </a>
                    <a href="{{ route('contact') }}" class="border-2 border-white text-white hover:bg-white hover:text-orange-600 font-semibold py-3 px-8 rounded-lg transition-colors duration-200">
                        Get Quote
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Our Catering -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-6">Why Choose Casa Jalisco Catering?</h2>
        <p class="text-lg text-dark-gray-600 max-w-3xl mx-auto">
            We bring restaurant-quality authentic Mexican cuisine directly to your event with professional service and attention to detail.
        </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Fresh Ingredients -->
        <div class="text-center">
            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-dark-gray-900 mb-4">Fresh Ingredients</h3>
            <p class="text-dark-gray-600">
                We use only the freshest ingredients and traditional spices to ensure authentic flavors in every dish.
            </p>
        </div>

        <!-- Professional Service -->
        <div class="text-center">
            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-dark-gray-900 mb-4">Professional Service</h3>
            <p class="text-dark-gray-600">
                Our experienced catering team ensures seamless setup, service, and cleanup for your event.
            </p>
        </div>

        <!-- Flexible Options -->
        <div class="text-center">
            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-dark-gray-900 mb-4">Flexible Options</h3>
            <p class="text-dark-gray-600">
                From intimate gatherings to large celebrations, we customize our services to fit your needs and budget.
            </p>
        </div>
    </div>
</section>

<!-- Catering Packages -->
<section id="packages" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-6">Catering Packages</h2>
        <p class="text-lg text-dark-gray-600">
            Choose from our carefully crafted packages or let us create a custom menu for your event.
        </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Basic Package -->
        <div class="bg-white rounded-2xl shadow-card p-8 border-2 border-gray-200">
            <div class="text-center mb-6">
                <h3 class="text-2xl font-bold text-dark-gray-900 mb-2">Básico</h3>
                <p class="text-dark-gray-600 mb-4">Perfect for small gatherings</p>
                <div class="text-3xl font-bold text-orange-600 mb-2">$15</div>
                <p class="text-sm text-dark-gray-500">per person (min. 15 people)</p>
            </div>
            
            <ul class="space-y-3 mb-8">
                <li class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-dark-gray-700">Choice of 2 taco varieties</span>
                </li>
                <li class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-dark-gray-700">Rice and beans</span>
                </li>
                <li class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-dark-gray-700">Salsas and condiments</span>
                </li>
                <li class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-dark-gray-700">Disposable plates & utensils</span>
                </li>
            </ul>
            
            <a href="{{ route('contact') }}" class="block text-center border-2 border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200">
                Order Package
            </a>
        </div>

        <!-- Premium Package -->
        <div class="bg-white rounded-2xl shadow-card p-8 border-2 border-orange-500 relative">
            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                <span class="bg-orange-500 text-white px-4 py-1 rounded-full text-sm font-semibold">Most Popular</span>
            </div>
            
            <div class="text-center mb-6">
                <h3 class="text-2xl font-bold text-dark-gray-900 mb-2">Premium</h3>
                <p class="text-dark-gray-600 mb-4">Great for medium events</p>
                <div class="text-3xl font-bold text-orange-600 mb-2">$25</div>
                <p class="text-sm text-dark-gray-500">per person (min. 25 people)</p>
            </div>
            
            <ul class="space-y-3 mb-8">
                <li class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-dark-gray-700">Choice of 3 main dishes</span>
                </li>
                <li class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-dark-gray-700">Rice, beans, and tortillas</span>
                </li>
                <li class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-dark-gray-700">Guacamole and chips</span>
                </li>
                <li class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-dark-gray-700">Horchata or agua fresca</span>
                </li>
                <li class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-dark-gray-700">Setup and basic service</span>
                </li>
            </ul>
            
            <a href="{{ route('contact') }}" class="block text-center btn-primary py-3 px-6">
                Order Package
            </a>
        </div>

        <!-- Deluxe Package -->
        <div class="bg-white rounded-2xl shadow-card p-8 border-2 border-gray-200">
            <div class="text-center mb-6">
                <h3 class="text-2xl font-bold text-dark-gray-900 mb-2">Deluxe</h3>
                <p class="text-dark-gray-600 mb-4">Perfect for special occasions</p>
                <div class="text-3xl font-bold text-orange-600 mb-2">$35</div>
                <p class="text-sm text-dark-gray-500">per person (min. 30 people)</p>
            </div>
            
            <ul class="space-y-3 mb-8">
                <li class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-dark-gray-700">Choice of 4 premium dishes</span>
                </li>
                <li class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-dark-gray-700">Full sides and appetizers</span>
                </li>
                <li class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-dark-gray-700">Premium beverages</span>
                </li>
                <li class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-dark-gray-700">Full service staff</span>
                </li>
                <li class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-dark-gray-700">Complete setup & cleanup</span>
                </li>
            </ul>
            
            <a href="{{ route('contact') }}" class="block text-center border-2 border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200">
                Order Package
            </a>
        </div>
    </div>
</section>

<!-- Popular Menu Items -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-6">Popular Catering Items</h2>
        <p class="text-lg text-dark-gray-600">
            Our most requested dishes for catered events
        </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow-card p-6 text-center">
            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="text-2xl">🌮</span>
            </div>
            <h3 class="text-lg font-semibold text-dark-gray-900 mb-2">Birria Tacos</h3>
            <p class="text-dark-gray-600 text-sm">Our signature dish</p>
        </div>
        
        <div class="bg-white rounded-lg shadow-card p-6 text-center">
            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="text-2xl">🥪</span>
            </div>
            <h3 class="text-lg font-semibold text-dark-gray-900 mb-2">Tortas Ahogadas</h3>
            <p class="text-dark-gray-600 text-sm">Traditional Jalisco specialty</p>
        </div>
        
        <div class="bg-white rounded-lg shadow-card p-6 text-center">
            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="text-2xl">🥩</span>
            </div>
            <h3 class="text-lg font-semibold text-dark-gray-900 mb-2">Carne Asada</h3>
            <p class="text-dark-gray-600 text-sm">Grilled marinated beef</p>
        </div>
        
        <div class="bg-white rounded-lg shadow-card p-6 text-center">
            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="text-2xl">🥤</span>
            </div>
            <h3 class="text-lg font-semibold text-dark-gray-900 mb-2">Horchata</h3>
            <p class="text-dark-gray-600 text-sm">Traditional rice drink</p>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="bg-gradient-to-r from-orange-500 to-red-600 rounded-2xl p-12 text-center text-white">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Plan Your Event?</h2>
        <p class="text-lg md:text-xl mb-8 opacity-90 max-w-2xl mx-auto">
            Contact us today for a custom quote and let us make your next event unforgettable with authentic Mexican flavors.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-white text-orange-600 hover:bg-gray-100 font-semibold py-3 px-8 rounded-lg transition-colors duration-200">
                Get Custom Quote
            </a>
            <a href="tel:+15551234567" class="border-2 border-white text-white hover:bg-white hover:text-orange-600 font-semibold py-3 px-8 rounded-lg transition-colors duration-200">
                Call: (555) 123-4567
            </a>
        </div>
    </div>
</section>
@endsection 