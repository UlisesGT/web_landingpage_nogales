@extends('layouts.app')

@section('title', 'Contact Us - Casa Jalisco')
@section('description', 'Contact Casa Jalisco for reservations, questions, or feedback. Visit our location in Jalisco, Mexico or reach out using our contact form.')

@section('content')
<!-- Contact Us Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-4xl md:text-5xl font-bold text-dark-gray-900 mb-4">Contact Us</h1>
        <p class="text-lg text-dark-gray-600 max-w-4xl">
            We'd love to hear from you! Whether you have a question, feedback, or want to make a reservation, please reach out using the information below or fill out the contact form.
        </p>
    </div>

    <!-- Our Location Section -->
    <div class="mb-12">
        <h2 class="text-2xl md:text-3xl font-bold text-dark-gray-900 mb-6">Our Location</h2>
        
        <!-- Google Maps Container -->
        <div class="bg-orange-100 rounded-2xl overflow-hidden h-80 md:h-96 relative">
            <!-- Google Maps Embed -->
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119066.71543435952!2d-103.39866796249999!3d20.65902095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b17b31a3c0b1%3A0xe2b5e89b95b7b0!2sGuadalajara%2C%20Jal.%2C%20Mexico!5e0!3m2!1sen!2sus!4v1234567890123!5m2!1sen!2sus"
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                class="absolute inset-0">
            </iframe>
        </div>
        
        <!-- Address -->
        <div class="mt-4">
            <p class="text-dark-gray-700 font-medium">123 Main Street, Jalisco, Mexico</p>
        </div>
    </div>

    <!-- Contact Information & Hours Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">
        
        <!-- Contact Information -->
        <div>
            <h2 class="text-2xl md:text-3xl font-bold text-dark-gray-900 mb-6">Contact Information</h2>
            
            <div class="space-y-6">
                <!-- Phone -->
                <div>
                    <h3 class="text-lg font-semibold text-dark-gray-900 mb-2">Phone</h3>
                    <a href="tel:+5555123-4567" class="text-dark-gray-600 hover:text-orange-500 transition-colors duration-200">
                        (555) 123-4567
                    </a>
                </div>
                
                <!-- Email -->
                <div>
                    <h3 class="text-lg font-semibold text-dark-gray-900 mb-2">Email</h3>
                    <a href="mailto:info@casajalisco.com" class="text-dark-gray-600 hover:text-orange-500 transition-colors duration-200">
                        info@casajalisco.com
                    </a>
                </div>
            </div>
        </div>

        <!-- Hours of Operation -->
        <div>
            <h2 class="text-2xl md:text-3xl font-bold text-dark-gray-900 mb-6">Hours of Operation</h2>
            
            <div class="space-y-4">
                <!-- Monday - Friday -->
                <div class="flex justify-between items-center">
                    <span class="text-dark-gray-700 font-medium">Monday - Friday</span>
                    <span class="text-dark-gray-600">11:00 AM - 10:00 PM</span>
                </div>
                
                <!-- Saturday -->
                <div class="flex justify-between items-center">
                    <span class="text-dark-gray-700 font-medium">Saturday</span>
                    <span class="text-dark-gray-600">12:00 PM - 11:00 PM</span>
                </div>
                
                <!-- Sunday -->
                <div class="flex justify-between items-center">
                    <span class="text-dark-gray-700 font-medium">Sunday</span>
                    <span class="text-dark-gray-600">12:00 PM - 9:00 PM</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="mb-12">
        <h2 class="text-2xl md:text-3xl font-bold text-dark-gray-900 mb-8">Contact Form</h2>
        
        <form class="max-w-2xl" action="#" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-dark-gray-700 mb-2">Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        placeholder="Your Name"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200"
                        required>
                </div>
                
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-dark-gray-700 mb-2">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Your Email"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200"
                        required>
                </div>
            </div>
            
            <!-- Phone -->
            <div class="mb-6">
                <label for="phone" class="block text-sm font-medium text-dark-gray-700 mb-2">Phone</label>
                <input 
                    type="tel" 
                    id="phone" 
                    name="phone" 
                    placeholder="Your Phone"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200">
            </div>
            
            <!-- Message -->
            <div class="mb-8">
                <label for="message" class="block text-sm font-medium text-dark-gray-700 mb-2">Message</label>
                <textarea 
                    id="message" 
                    name="message" 
                    rows="6" 
                    placeholder="Your message..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200 resize-vertical"
                    required></textarea>
            </div>
            
            <!-- Submit Button -->
            <button 
                type="submit" 
                class="btn-primary px-8 py-3 text-lg">
                Submit
            </button>
        </form>
    </div>
</section>

<!-- Footer Navigation (antes del footer principal) -->
<section class="bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-center items-center space-y-4 md:space-y-0 md:space-x-8">
            <a href="#menu" class="text-dark-gray-600 hover:text-orange-500 font-medium transition-colors duration-200">Menu</a>
            <a href="{{ route('catenos') }}" class="text-dark-gray-600 hover:text-orange-500 font-medium transition-colors duration-200">Order Online</a>
            <a href="#about" class="text-dark-gray-600 hover:text-orange-500 font-medium transition-colors duration-200">About</a>
            <a href="{{ route('catenos') }}" class="text-dark-gray-600 hover:text-orange-500 font-medium transition-colors duration-200">Contact</a>
        </div>
        
        <!-- Social Media Icons -->
        <div class="flex justify-center space-x-6 mt-6">
            <a href="#" class="text-dark-gray-400 hover:text-orange-500 transition-colors duration-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                </svg>
            </a>
            <a href="#" class="text-dark-gray-400 hover:text-orange-500 transition-colors duration-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
            </a>
            <a href="#" class="text-dark-gray-400 hover:text-orange-500 transition-colors duration-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                </svg>
            </a>
        </div>
        
        <!-- Copyright -->
        <div class="text-center mt-6">
            <p class="text-dark-gray-500 text-sm">© 2024 Casa Jalisco. All rights reserved.</p>
        </div>
    </div>
</section>
@endsection 