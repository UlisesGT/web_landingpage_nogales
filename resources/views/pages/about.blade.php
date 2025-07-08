@extends('layouts.app')

@section('title', 'About Us - Casa Jalisco')
@section('description', 'Learn about Casa Jalisco\'s story, values, and commitment to authentic Mexican cuisine from Jalisco.')

@section('content')
<!-- Our Story Hero Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="relative bg-gradient-to-r from-amber-900 via-orange-800 to-amber-900 rounded-2xl overflow-hidden h-80 md:h-96">
        <!-- Restaurant Background -->
        <div class="absolute inset-0" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('data:image/svg+xml,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 1000 600&quot;><rect width=&quot;100%&quot; height=&quot;100%&quot; fill=&quot;%23a16207&quot;/><rect x=&quot;100&quot; y=&quot;300&quot; width=&quot;800&quot; height=&quot;200&quot; fill=&quot;%23b45309&quot; rx=&quot;20&quot;/><circle cx=&quot;200&quot; cy=&quot;400&quot; r=&quot;30&quot; fill=&quot;%23f59e0b&quot; opacity=&quot;0.6&quot;/><circle cx=&quot;400&quot; cy=&quot;400&quot; r=&quot;30&quot; fill=&quot;%23f59e0b&quot; opacity=&quot;0.6&quot;/><circle cx=&quot;600&quot; cy=&quot;400&quot; r=&quot;30&quot; fill=&quot;%23f59e0b&quot; opacity=&quot;0.6&quot;/><circle cx=&quot;800&quot; cy=&quot;400&quot; r=&quot;30&quot; fill=&quot;%23f59e0b&quot; opacity=&quot;0.6&quot;/></svg>'); background-size: cover; background-position: center;"></div>
        
        <!-- Hero Content -->
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white px-6">
            <div class="max-w-4xl">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Our Story
                </h1>
                <p class="text-lg md:text-xl leading-relaxed opacity-90 max-w-3xl mx-auto">
                    Casa Jalisco was founded in 2010 by Chef Ricardo Alvarez, a native of Guadalajara, with a vision to bring the rich flavors of Jalisco to our community. Inspired by his grandmother's recipes and a passion for traditional Mexican cuisine, he created a menu that celebrates the rich culinary heritage of his homeland. From our signature birria to our mouth-watering tortas ahogadas, each dish is crafted meticulously and with the finest ingredients, ensuring an authentic and unforgettable experience.
                </p>
                <div class="mt-8">
                    <button class="btn-primary text-lg px-8 py-3">
                        View Menu
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Mission Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="bg-gradient-to-r from-orange-50 to-amber-50 rounded-3xl p-8 md:p-12">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-8">Misión</h2>
            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-10">
                <div class="flex items-center justify-center mb-6">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-lg md:text-xl text-dark-gray-700 leading-relaxed">
                    Nuestra misión es <strong class="text-orange-600">crecer y hacer crecer colaboradores</strong>, donde cada elemento esté orgulloso de su desarrollo a base de resultados. Esto nos permite brindar a nuestros clientes <strong class="text-orange-600">servicio, calidad</strong> y llegar a todo tipo de <strong class="text-orange-600">eventos y empresas</strong>.
                </p>
                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <span class="bg-orange-100 text-orange-800 px-4 py-2 rounded-full text-sm font-medium">
                        Crecimiento
                    </span>
                    <span class="bg-orange-100 text-orange-800 px-4 py-2 rounded-full text-sm font-medium">
                        Calidad
                    </span>
                    <span class="bg-orange-100 text-orange-800 px-4 py-2 rounded-full text-sm font-medium">
                        Servicio
                    </span>
                    <span class="bg-orange-100 text-orange-800 px-4 py-2 rounded-full text-sm font-medium">
                        Eventos
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Values Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h2 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-4">Our Values</h2>
</section>

<!-- Our Commitment Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
    <h2 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-8">Our Commitment</h2>
    <p class="text-lg text-dark-gray-600 mb-12 max-w-4xl">
        At Casa Jalisco, we are driven by a set of core values that guide everything we do. From our kitchen to our dining room, we strive to uphold these principles in every aspect of our restaurant.
    </p>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Authenticity -->
        <div class="text-center">
            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-dark-gray-900 mb-4">Authenticity</h3>
            <p class="text-dark-gray-600 leading-relaxed">
                We are committed to preserving the traditional recipes and cooking techniques of Jalisco, ensuring every dish is a true reflection of its origins.
            </p>
        </div>

        <!-- Community -->
        <div class="text-center">
            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-dark-gray-900 mb-4">Community</h3>
            <p class="text-dark-gray-600 leading-relaxed">
                We believe in creating a sense of community through shared meals and experiences. We strive to foster a sense of community and belonging.
            </p>
        </div>

        <!-- Quality -->
        <div class="text-center">
            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-dark-gray-900 mb-4">Quality</h3>
            <p class="text-dark-gray-600 leading-relaxed">
                We are committed to using only the finest quality ingredients, sourced locally whenever possible, to deliver exceptional flavor and nutrition in every bite.
            </p>
        </div>
    </div>
</section>

<!-- Meet Our Team Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h2 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-12">Meet Our Team</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Ricardo Alvarez -->
        <div class="text-center">
            <div class="w-64 h-64 bg-gradient-to-br from-gray-600 to-gray-800 rounded-2xl mx-auto mb-6 overflow-hidden relative">
                <!-- Chef silhouette -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-32 h-32 bg-white rounded-full opacity-20"></div>
                </div>
                <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
                    <div class="w-24 h-8 bg-white rounded-lg opacity-30"></div>
                </div>
            </div>
            <h3 class="text-xl font-bold text-dark-gray-900 mb-2">Ricardo Alvarez</h3>
            <p class="text-orange-600 font-semibold mb-4">Founder & Executive Chef</p>
            <p class="text-dark-gray-600 text-sm leading-relaxed">
                Ricardo brings over 15 years of culinary experience, specializing in traditional Mexican cuisine. His passion for Jalisco's flavors is the heart of Casa Jalisco.
            </p>
        </div>

        <!-- Sofia Ramirez -->
        <div class="text-center">
            <div class="w-64 h-64 bg-gradient-to-br from-orange-600 to-red-600 rounded-2xl mx-auto mb-6 overflow-hidden relative">
                <!-- Manager silhouette -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-28 h-28 bg-white rounded-full opacity-25"></div>
                </div>
                <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2">
                    <div class="w-20 h-6 bg-white rounded-lg opacity-35"></div>
                </div>
            </div>
            <h3 class="text-xl font-bold text-dark-gray-900 mb-2">Sofia Ramirez</h3>
            <p class="text-orange-600 font-semibold mb-4">General Manager</p>
            <p class="text-dark-gray-600 text-sm leading-relaxed">
                Sofia oversees daily operations and restaurant experience, ensuring a seamless and memorable experience for every guest. Her dedication to hospitality is unmatched.
            </p>
        </div>

        <!-- Alejandro Vargas -->
        <div class="text-center">
            <div class="w-64 h-64 bg-gradient-to-br from-green-600 to-blue-600 rounded-2xl mx-auto mb-6 overflow-hidden relative">
                <!-- Sous chef silhouette -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-30 h-30 bg-white rounded-full opacity-22"></div>
                </div>
                <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2">
                    <div class="w-22 h-7 bg-white rounded-lg opacity-32"></div>
                </div>
            </div>
            <h3 class="text-xl font-bold text-dark-gray-900 mb-2">Alejandro Vargas</h3>
            <p class="text-orange-600 font-semibold mb-4">Sous Chef</p>
            <p class="text-dark-gray-600 text-sm leading-relaxed">
                Alejandro assists in menu development, bringing the authentic taste of Casa Jalisco to patrons of all ages. His attention to detail ensures every catering experience is exceptional.
            </p>
        </div>
    </div>
</section>

<!-- Our Signature Dishes Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h2 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-12">Our Signature Dishes</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Birria Tacos -->
        <div class="bg-white rounded-2xl shadow-card overflow-hidden">
            <div class="h-64 bg-gradient-to-br from-red-900 via-red-800 to-orange-700 relative">
                <!-- Birria Tacos simulation -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-32 h-32 bg-orange-400 rounded-full opacity-20"></div>
                </div>
                <div class="absolute bottom-6 left-6 right-6">
                    <div class="bg-yellow-600 h-8 rounded-lg opacity-80 mb-2"></div>
                    <div class="bg-red-700 h-6 rounded-lg opacity-70"></div>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-dark-gray-900 mb-4">Birria Tacos</h3>
                <p class="text-dark-gray-600 leading-relaxed">
                    Our slow-cooked birria is marinated in a blend of spicy herbs, then with a side of consommé for dipping.
                </p>
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
                <h3 class="text-xl font-bold text-dark-gray-900 mb-4">Tortas Ahogadas</h3>
                <p class="text-dark-gray-600 leading-relaxed">
                    A traditional Jalisco specialty, our tortas ahogadas are drowned in a rich, flavorful tomato sauce.
                </p>
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
                <h3 class="text-xl font-bold text-dark-gray-900 mb-4">Carne Asada</h3>
                <p class="text-dark-gray-600 leading-relaxed">
                    Grilled to perfection, our carne asada is served with traditional sides, beans, and guacamole.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Us Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="max-w-2xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-8 text-center">Contact Us</h2>
        <p class="text-lg text-dark-gray-600 mb-12 text-center">
            We'd love to hear from you! Whether you have a question, feedback, or want to book a table, please reach out to us.
        </p>
        
        <form class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-dark-gray-700 mb-2">Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200"
                        placeholder="Your name">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-dark-gray-700 mb-2">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200"
                        placeholder="your@email.com">
                </div>
            </div>
            
            <div>
                <label for="message" class="block text-sm font-medium text-dark-gray-700 mb-2">Message</label>
                <textarea 
                    id="message" 
                    name="message" 
                    rows="4"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200 resize-vertical"
                    placeholder="Your message..."></textarea>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn-primary px-8 py-3">
                    Send
                </button>
            </div>
        </form>
        
        <div class="mt-12 text-center">
            <p class="text-dark-gray-600 mb-6">Follow us on social media for updates and special offers!</p>
            
            <!-- Social Media Links -->
            <div class="flex justify-center space-x-6">
                <a href="#" class="text-dark-gray-400 hover:text-orange-500 transition-colors duration-200">
                    <span class="sr-only">Instagram</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                    <span class="block text-xs mt-1">Instagram</span>
                </a>
                
                <a href="#" class="text-dark-gray-400 hover:text-orange-500 transition-colors duration-200">
                    <span class="sr-only">Facebook</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                    <span class="block text-xs mt-1">Facebook</span>
                </a>
                
                <a href="#" class="text-dark-gray-400 hover:text-orange-500 transition-colors duration-200">
                    <span class="sr-only">Twitter</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                    </svg>
                    <span class="block text-xs mt-1">Twitter</span>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection 