@extends('layouts.app')

@section('title', 'Order Online - Casa Jalisco')
@section('description', 'Enjoy the authentic flavors of Jalisco from the comfort of your home. Order online for pickup or delivery.')

@section('content')
<!-- Hero Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="relative bg-gradient-to-r from-amber-900 via-orange-800 to-amber-900 rounded-2xl overflow-hidden h-96 md:h-[400px]">
        <!-- Restaurant Interior Background -->
        <div class="absolute inset-0" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('data:image/svg+xml,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 1000 600&quot;><rect width=&quot;100%&quot; height=&quot;100%&quot; fill=&quot;%23a16207&quot;/><rect x=&quot;0&quot; y=&quot;0&quot; width=&quot;100%&quot; height=&quot;200&quot; fill=&quot;%23b45309&quot;/><circle cx=&quot;200&quot; cy=&quot;120&quot; r=&quot;40&quot; fill=&quot;%23fbbf24&quot; opacity=&quot;0.3&quot;/><circle cx=&quot;500&quot; cy=&quot;120&quot; r=&quot;40&quot; fill=&quot;%23fbbf24&quot; opacity=&quot;0.3&quot;/><circle cx=&quot;800&quot; cy=&quot;120&quot; r=&quot;40&quot; fill=&quot;%23fbbf24&quot; opacity=&quot;0.3&quot;/></svg>'); background-size: cover; background-position: center;"></div>
        
        <!-- Hero Content -->
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white px-6">
            <div class="max-w-4xl">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Order Online
                </h1>
                <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto leading-relaxed opacity-90">
                    Enjoy the authentic flavors of Jalisco from the comfort of your home.
                </p>
                <button onclick="scrollToMenu()" class="btn-primary text-lg px-8 py-3">
                    View Menu
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Featured Dishes Section -->
<section id="featured-dishes" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h2 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-12">Featured Dishes</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Birria Tacos -->
        <div class="dish-card bg-white shadow-card relative">
            <div class="h-64 bg-gradient-to-br from-red-900 via-red-800 to-orange-700 relative overflow-hidden">
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
                <h3 class="text-xl font-semibold text-dark-gray-900 mb-2">Birria Tacos</h3>
                <p class="text-dark-gray-600 text-sm mb-4">Slow-cooked beef tacos with a rich consommé.</p>
                <div class="flex items-center justify-between">
                    <span class="text-2xl font-bold text-orange-600">$15.99</span>
                    <button onclick="addToCart('birria-tacos', 'Birria Tacos', 15.99)" 
                            class="btn-primary px-4 py-2 text-sm">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>

        <!-- Torta Ahogada -->
        <div class="dish-card bg-white shadow-card relative">
            <div class="h-64 bg-gradient-to-br from-yellow-800 via-orange-600 to-red-600 relative overflow-hidden">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-40 h-20 bg-yellow-200 rounded-lg opacity-90 shadow-lg"></div>
                </div>
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
                    <div class="w-2 h-12 bg-red-600 rounded-full opacity-80"></div>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-semibold text-dark-gray-900 mb-2">Torta Ahogada</h3>
                <p class="text-dark-gray-600 text-sm mb-4">Drowned sandwich with spicy tomato sauce.</p>
                <div class="flex items-center justify-between">
                    <span class="text-2xl font-bold text-orange-600">$12.99</span>
                    <button onclick="addToCart('torta-ahogada', 'Torta Ahogada', 12.99)" 
                            class="btn-primary px-4 py-2 text-sm">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>

        <!-- Carne Asada -->
        <div class="dish-card bg-white shadow-card relative">
            <div class="h-64 bg-gradient-to-br from-gray-800 via-red-900 to-orange-800 relative overflow-hidden">
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
                <h3 class="text-xl font-semibold text-dark-gray-900 mb-2">Carne Asada</h3>
                <p class="text-dark-gray-600 text-sm mb-4">Grilled marinated beef served with sides.</p>
                <div class="flex items-center justify-between">
                    <span class="text-2xl font-bold text-orange-600">$18.99</span>
                    <button onclick="addToCart('carne-asada', 'Carne Asada', 18.99)" 
                            class="btn-primary px-4 py-2 text-sm">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Menu Categories Section -->
<section id="menu-categories" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h2 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-12">Menu Categories</h2>
    
    <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
        <!-- Birria -->
        <div class="category-card bg-yellow-100 rounded-2xl overflow-hidden cursor-pointer hover:shadow-lg transition-all duration-300" onclick="viewCategory('birria')">
            <div class="h-32 bg-gradient-to-br from-red-900 to-orange-700 relative">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-16 h-16 bg-orange-400 rounded-full opacity-30"></div>
                </div>
            </div>
            <div class="p-4 text-center">
                <h3 class="font-semibold text-dark-gray-900">Birria</h3>
            </div>
        </div>

        <!-- Tacos -->
        <div class="category-card bg-gray-900 rounded-2xl overflow-hidden cursor-pointer hover:shadow-lg transition-all duration-300" onclick="viewCategory('tacos')">
            <div class="h-32 bg-gradient-to-br from-yellow-600 to-orange-600 relative">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-20 h-12 bg-yellow-200 rounded-lg opacity-80"></div>
                </div>
            </div>
            <div class="p-4 text-center">
                <h3 class="font-semibold text-white">Tacos</h3>
            </div>
        </div>

        <!-- Tortas -->
        <div class="category-card bg-blue-100 rounded-2xl overflow-hidden cursor-pointer hover:shadow-lg transition-all duration-300" onclick="viewCategory('tortas')">
            <div class="h-32 bg-gradient-to-br from-orange-600 to-yellow-600 relative">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-24 h-16 bg-yellow-200 rounded-lg opacity-90"></div>
                </div>
            </div>
            <div class="p-4 text-center">
                <h3 class="font-semibold text-dark-gray-900">Tortas</h3>
            </div>
        </div>

        <!-- Drinks -->
        <div class="category-card bg-green-100 rounded-2xl overflow-hidden cursor-pointer hover:shadow-lg transition-all duration-300" onclick="viewCategory('drinks')">
            <div class="h-32 bg-gradient-to-br from-green-600 to-blue-600 relative">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-8 h-16 bg-green-200 rounded-lg opacity-80"></div>
                    <div class="w-8 h-16 bg-green-200 rounded-lg opacity-80 ml-2"></div>
                </div>
            </div>
            <div class="p-4 text-center">
                <h3 class="font-semibold text-dark-gray-900">Drinks</h3>
            </div>
        </div>

        <!-- Sides -->
        <div class="category-card bg-orange-100 rounded-2xl overflow-hidden cursor-pointer hover:shadow-lg transition-all duration-300" onclick="viewCategory('sides')">
            <div class="h-32 bg-gradient-to-br from-orange-400 to-yellow-400 relative">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-12 h-12 bg-orange-200 rounded-full opacity-80"></div>
                </div>
            </div>
            <div class="p-4 text-center">
                <h3 class="font-semibold text-dark-gray-900">Sides</h3>
            </div>
        </div>
    </div>
</section>

<!-- Our Story Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h2 class="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-8">Our Story</h2>
    <div class="max-w-4xl">
        <p class="text-lg text-dark-gray-600 leading-relaxed mb-8">
            Casa Jalisco is a family-owned restaurant dedicated to bringing the rich culinary traditions of Jalisco to your table. Our recipes have been passed down through generations, ensuring an authentic and unforgettable dining experience. From our signature birria to our mouth-watering tortas ahogadas, each dish is prepared with the freshest ingredients and a whole lot of love.
        </p>
        <button class="btn-primary px-6 py-3">
            Learn More
        </button>
    </div>
</section>

<!-- Shopping Cart Sidebar -->
<div id="cart-sidebar" class="fixed right-0 top-0 h-full w-80 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 z-50">
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-bold text-dark-gray-900">Your Order</h3>
            <button onclick="toggleCart()" class="text-dark-gray-500 hover:text-dark-gray-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
    
    <div class="flex-1 overflow-y-auto p-6">
        <div id="cart-items">
            <!-- Cart items will be dynamically added here -->
        </div>
    </div>
    
    <div class="border-t border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <span class="text-lg font-semibold">Total:</span>
            <span id="cart-total" class="text-2xl font-bold text-orange-600">$0.00</span>
        </div>
        <button onclick="proceedToCheckout()" class="btn-primary w-full py-3" id="checkout-btn" disabled>
            Proceed to Checkout
        </button>
    </div>
</div>

<!-- Cart overlay -->
<div id="cart-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40" onclick="toggleCart()"></div>

<!-- Floating Cart Button -->
<div id="floating-cart" class="fixed bottom-6 right-6 z-30 hidden">
    <button onclick="toggleCart()" class="bg-orange-500 hover:bg-orange-600 text-white rounded-full p-4 shadow-lg transition-all duration-300">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 11-4 0v-6m4 0V9a2 2 0 10-4 0v4.01"/>
        </svg>
        <span id="cart-count" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-6 w-6 flex items-center justify-center">0</span>
    </button>
</div>

<script>
let cart = [];
let cartCount = 0;
let cartTotal = 0;

function scrollToMenu() {
    document.getElementById('featured-dishes').scrollIntoView({ behavior: 'smooth' });
}

function addToCart(id, name, price) {
    const existingItem = cart.find(item => item.id === id);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            id: id,
            name: name,
            price: price,
            quantity: 1
        });
    }
    
    updateCartDisplay();
    showFloatingCart();
    
    // Show success message
    showAddedToCartMessage(name);
}

function removeFromCart(id) {
    cart = cart.filter(item => item.id !== id);
    updateCartDisplay();
    
    if (cart.length === 0) {
        hideFloatingCart();
    }
}

function updateQuantity(id, change) {
    const item = cart.find(item => item.id === id);
    if (item) {
        item.quantity += change;
        if (item.quantity <= 0) {
            removeFromCart(id);
        } else {
            updateCartDisplay();
        }
    }
}

function updateCartDisplay() {
    cartCount = cart.reduce((total, item) => total + item.quantity, 0);
    cartTotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
    
    document.getElementById('cart-count').textContent = cartCount;
    document.getElementById('cart-total').textContent = `$${cartTotal.toFixed(2)}`;
    
    const cartItems = document.getElementById('cart-items');
    cartItems.innerHTML = '';
    
    if (cart.length === 0) {
        cartItems.innerHTML = '<p class="text-gray-500 text-center">Your cart is empty</p>';
        document.getElementById('checkout-btn').disabled = true;
        document.getElementById('checkout-btn').classList.add('opacity-50');
    } else {
        document.getElementById('checkout-btn').disabled = false;
        document.getElementById('checkout-btn').classList.remove('opacity-50');
        
        cart.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.className = 'flex items-center justify-between py-3 border-b border-gray-200';
            itemElement.innerHTML = `
                <div class="flex-1">
                    <h4 class="font-semibold text-dark-gray-900">${item.name}</h4>
                    <p class="text-orange-600 font-semibold">$${item.price.toFixed(2)}</p>
                </div>
                <div class="flex items-center space-x-2">
                    <button onclick="updateQuantity('${item.id}', -1)" class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                        </svg>
                    </button>
                    <span class="w-8 text-center font-semibold">${item.quantity}</span>
                    <button onclick="updateQuantity('${item.id}', 1)" class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </button>
                </div>
            `;
            cartItems.appendChild(itemElement);
        });
    }
}

function toggleCart() {
    const sidebar = document.getElementById('cart-sidebar');
    const overlay = document.getElementById('cart-overlay');
    
    sidebar.classList.toggle('translate-x-full');
    overlay.classList.toggle('hidden');
}

function showFloatingCart() {
    document.getElementById('floating-cart').classList.remove('hidden');
}

function hideFloatingCart() {
    document.getElementById('floating-cart').classList.add('hidden');
}

function showAddedToCartMessage(itemName) {
    // Create a temporary notification
    const notification = document.createElement('div');
    notification.className = 'fixed top-20 right-6 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
    notification.textContent = `${itemName} added to cart!`;
    document.body.appendChild(notification);
    
    // Show the notification
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);
    
    // Hide and remove the notification
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 2000);
}

function viewCategory(category) {
    alert(`Viewing ${category} category - Feature coming soon!`);
}

function proceedToCheckout() {
    if (cart.length > 0) {
        // Store cart data in localStorage for checkout page
        localStorage.setItem('cartData', JSON.stringify(cart));
        localStorage.setItem('cartTotal', cartTotal.toFixed(2));
        
        // Redirect to checkout
        window.location.href = '/checkout';
    }
}

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    updateCartDisplay();
});
</script>
@endsection 