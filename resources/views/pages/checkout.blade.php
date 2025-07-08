@extends('layouts.app')

@section('title', 'Checkout - Casa Jalisco')
@section('description', 'Complete your order from Casa Jalisco. Enter your delivery information and finalize your purchase.')

@section('content')
<!-- Checkout Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl md:text-5xl font-bold text-dark-gray-900 mb-4">Checkout</h1>
            <p class="text-lg text-dark-gray-600">
                Complete your order and we'll prepare your delicious meal!
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Order Form -->
            <div class="bg-white rounded-2xl shadow-card p-8">
                <h2 class="text-2xl font-bold text-dark-gray-900 mb-6">Delivery Information</h2>
                
                <form id="checkout-form">
                    <!-- Customer Information -->
                    <div class="space-y-6">
                        <!-- Name -->
                        <div>
                            <label for="customer-name" class="block text-sm font-medium text-dark-gray-700 mb-2">Full Name *</label>
                            <input 
                                type="text" 
                                id="customer-name" 
                                name="customer-name" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200"
                                placeholder="Your full name">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="customer-phone" class="block text-sm font-medium text-dark-gray-700 mb-2">Phone Number *</label>
                            <input 
                                type="tel" 
                                id="customer-phone" 
                                name="customer-phone" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200"
                                placeholder="(555) 123-4567">
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="customer-email" class="block text-sm font-medium text-dark-gray-700 mb-2">Email Address *</label>
                            <input 
                                type="email" 
                                id="customer-email" 
                                name="customer-email" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200"
                                placeholder="your.email@example.com">
                        </div>
                    </div>

                    <!-- Delivery Address -->
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-dark-gray-900 mb-4">Delivery Address</h3>
                        
                        <div class="space-y-4">
                            <!-- Street Address -->
                            <div>
                                <label for="street-address" class="block text-sm font-medium text-dark-gray-700 mb-2">Street Address *</label>
                                <input 
                                    type="text" 
                                    id="street-address" 
                                    name="street-address" 
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200"
                                    placeholder="123 Main Street">
                            </div>

                            <!-- City, State, ZIP -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="city" class="block text-sm font-medium text-dark-gray-700 mb-2">City *</label>
                                    <input 
                                        type="text" 
                                        id="city" 
                                        name="city" 
                                        required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200"
                                        placeholder="Guadalajara">
                                </div>
                                <div>
                                    <label for="postal-code" class="block text-sm font-medium text-dark-gray-700 mb-2">Postal Code *</label>
                                    <input 
                                        type="text" 
                                        id="postal-code" 
                                        name="postal-code" 
                                        required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200"
                                        placeholder="44100">
                                </div>
                            </div>

                            <!-- Delivery Instructions -->
                            <div>
                                <label for="delivery-instructions" class="block text-sm font-medium text-dark-gray-700 mb-2">Delivery Instructions (Optional)</label>
                                <textarea 
                                    id="delivery-instructions" 
                                    name="delivery-instructions" 
                                    rows="3"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200 resize-vertical"
                                    placeholder="Any special instructions for delivery..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Order Type -->
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-dark-gray-900 mb-4">Order Type</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="relative">
                                <input type="radio" name="order-type" value="delivery" checked class="sr-only">
                                <div class="order-type-card border-2 border-orange-500 bg-orange-50 p-4 rounded-lg cursor-pointer transition-all duration-200 hover:shadow-md">
                                    <div class="text-center">
                                        <svg class="w-8 h-8 text-orange-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h1.586a1 1 0 01.707.293l1.414 1.414a1 1 0 00.707.293H11a2 2 0 110 4H5zM5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                                        </svg>
                                        <span class="font-semibold text-dark-gray-900">Delivery</span>
                                        <p class="text-sm text-dark-gray-600 mt-1">$3.99 delivery fee</p>
                                    </div>
                                </div>
                            </label>
                            
                            <label class="relative">
                                <input type="radio" name="order-type" value="pickup" class="sr-only">
                                <div class="order-type-card border-2 border-gray-300 bg-white p-4 rounded-lg cursor-pointer transition-all duration-200 hover:shadow-md">
                                    <div class="text-center">
                                        <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                        </svg>
                                        <span class="font-semibold text-dark-gray-900">Pickup</span>
                                        <p class="text-sm text-dark-gray-600 mt-1">Ready in 20-30 min</p>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="bg-gray-50 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-dark-gray-900 mb-6">Order Summary</h2>
                
                <!-- Cart Items -->
                <div id="order-items" class="space-y-4 mb-6">
                    <!-- Items will be populated by JavaScript -->
                </div>

                <!-- Order Totals -->
                <div class="border-t border-gray-300 pt-6">
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-dark-gray-600">Subtotal</span>
                            <span id="subtotal" class="font-semibold">$0.00</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-dark-gray-600">Tax (8.25%)</span>
                            <span id="tax-amount" class="font-semibold">$0.00</span>
                        </div>
                        <div id="delivery-fee-row" class="flex justify-between items-center">
                            <span class="text-dark-gray-600">Delivery Fee</span>
                            <span id="delivery-fee" class="font-semibold">$3.99</span>
                        </div>
                        <div class="border-t border-gray-300 pt-3">
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-dark-gray-900">Total</span>
                                <span id="final-total" class="text-2xl font-bold text-orange-600">$0.00</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 space-y-4">
                    <button 
                        onclick="placeOrder()" 
                        id="place-order-btn"
                        class="btn-primary w-full py-4 text-lg">
                        Place Order
                    </button>
                    <a href="/order-online" class="block text-center text-dark-gray-600 hover:text-orange-500 transition-colors duration-200">
                        ← Back to Menu
                    </a>
                </div>

                <!-- Estimated Delivery Time -->
                <div class="mt-6 p-4 bg-orange-50 rounded-lg">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-sm font-medium text-orange-800">Estimated delivery: <span id="delivery-time">45-60 minutes</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Modal -->
<div id="success-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl p-8 max-w-md w-full">
        <div class="text-center">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-dark-gray-900 mb-4">Order Confirmed!</h3>
            <p class="text-dark-gray-600 mb-6">Thank you for your order! We'll send you a confirmation email shortly.</p>
            <div class="space-y-3">
                <p class="text-sm text-dark-gray-500">
                    <strong>Order #:</strong> <span id="order-number">CJ-12345</span>
                </p>
                <p class="text-sm text-dark-gray-500">
                    <strong>Estimated Time:</strong> <span id="estimated-time">45-60 minutes</span>
                </p>
            </div>
            <button onclick="closeSuccessModal()" class="btn-primary w-full mt-6">
                Continue Shopping
            </button>
        </div>
    </div>
</div>

<script>
let cartData = [];
let cartTotal = 0;
let deliveryFee = 3.99;
let taxRate = 0.0825;

document.addEventListener('DOMContentLoaded', function() {
    loadCartData();
    setupOrderTypeToggle();
    calculateTotals();
});

function loadCartData() {
    const storedCart = localStorage.getItem('cartData');
    const storedTotal = localStorage.getItem('cartTotal');
    
    if (storedCart && storedTotal) {
        cartData = JSON.parse(storedCart);
        cartTotal = parseFloat(storedTotal);
        displayOrderItems();
    } else {
        // Redirect back to order page if no cart data
        window.location.href = '/order-online';
    }
}

function displayOrderItems() {
    const orderItemsContainer = document.getElementById('order-items');
    orderItemsContainer.innerHTML = '';
    
    if (cartData.length === 0) {
        orderItemsContainer.innerHTML = '<p class="text-gray-500 text-center">No items in cart</p>';
        return;
    }
    
    cartData.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.className = 'flex items-center justify-between py-3 border-b border-gray-200';
        itemElement.innerHTML = `
            <div class="flex-1">
                <h4 class="font-semibold text-dark-gray-900">${item.name}</h4>
                <p class="text-sm text-dark-gray-600">Quantity: ${item.quantity}</p>
            </div>
            <div class="text-right">
                <p class="font-semibold text-dark-gray-900">$${(item.price * item.quantity).toFixed(2)}</p>
                <p class="text-sm text-dark-gray-600">$${item.price.toFixed(2)} each</p>
            </div>
        `;
        orderItemsContainer.appendChild(itemElement);
    });
}

function setupOrderTypeToggle() {
    const orderTypeInputs = document.querySelectorAll('input[name="order-type"]');
    
    orderTypeInputs.forEach(input => {
        input.addEventListener('change', function() {
            // Update visual state
            orderTypeInputs.forEach(otherInput => {
                const card = otherInput.closest('label').querySelector('.order-type-card');
                if (otherInput.checked) {
                    card.classList.remove('border-gray-300', 'bg-white');
                    card.classList.add('border-orange-500', 'bg-orange-50');
                    card.querySelector('svg').classList.remove('text-gray-400');
                    card.querySelector('svg').classList.add('text-orange-500');
                } else {
                    card.classList.remove('border-orange-500', 'bg-orange-50');
                    card.classList.add('border-gray-300', 'bg-white');
                    card.querySelector('svg').classList.remove('text-orange-500');
                    card.querySelector('svg').classList.add('text-gray-400');
                }
            });
            
            // Update delivery fee and time
            updateDeliveryInfo();
            calculateTotals();
        });
    });
}

function updateDeliveryInfo() {
    const orderType = document.querySelector('input[name="order-type"]:checked').value;
    const deliveryFeeRow = document.getElementById('delivery-fee-row');
    const deliveryTimeElement = document.getElementById('delivery-time');
    
    if (orderType === 'pickup') {
        deliveryFeeRow.style.display = 'none';
        deliveryFee = 0;
        deliveryTimeElement.textContent = '20-30 minutes';
    } else {
        deliveryFeeRow.style.display = 'flex';
        deliveryFee = 3.99;
        deliveryTimeElement.textContent = '45-60 minutes';
    }
}

function calculateTotals() {
    const subtotal = cartTotal;
    const taxAmount = subtotal * taxRate;
    const finalTotal = subtotal + taxAmount + deliveryFee;
    
    document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
    document.getElementById('tax-amount').textContent = `$${taxAmount.toFixed(2)}`;
    document.getElementById('delivery-fee').textContent = `$${deliveryFee.toFixed(2)}`;
    document.getElementById('final-total').textContent = `$${finalTotal.toFixed(2)}`;
}

function placeOrder() {
    const form = document.getElementById('checkout-form');
    
    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }
    
    // Get form data
    const formData = new FormData(form);
    const orderData = {
        customer: {
            name: formData.get('customer-name'),
            phone: formData.get('customer-phone'),
            email: formData.get('customer-email')
        },
        address: {
            street: formData.get('street-address'),
            city: formData.get('city'),
            postalCode: formData.get('postal-code'),
            instructions: formData.get('delivery-instructions')
        },
        orderType: formData.get('order-type'),
        items: cartData,
        totals: {
            subtotal: cartTotal,
            tax: cartTotal * taxRate,
            deliveryFee: deliveryFee,
            total: cartTotal + (cartTotal * taxRate) + deliveryFee
        }
    };
    
    // Simulate order processing
    showLoadingState();
    
    setTimeout(async () => {
        try {
            // Register order and user for reviews system
            await fetch('/api/complete-order', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                },
                body: JSON.stringify({
                    user_email: orderData.customer.email,
                    user_name: orderData.customer.name,
                    order_data: orderData
                })
            });
            
            console.log('User registered for reviews system');
        } catch (error) {
            console.error('Error registering user for reviews:', error);
        } finally {
            hideLoadingState();
            showSuccessModal();
            clearCart();
        }
    }, 2000);
}

function showLoadingState() {
    const button = document.getElementById('place-order-btn');
    button.innerHTML = 'Processing Order...';
    button.disabled = true;
    button.classList.add('opacity-75');
}

function hideLoadingState() {
    const button = document.getElementById('place-order-btn');
    button.innerHTML = 'Place Order';
    button.disabled = false;
    button.classList.remove('opacity-75');
}

function showSuccessModal() {
    // Generate random order number
    const orderNumber = 'CJ-' + Math.floor(Math.random() * 90000 + 10000);
    document.getElementById('order-number').textContent = orderNumber;
    
    // Set estimated time based on order type
    const orderType = document.querySelector('input[name="order-type"]:checked').value;
    const estimatedTime = orderType === 'pickup' ? '20-30 minutes' : '45-60 minutes';
    document.getElementById('estimated-time').textContent = estimatedTime;
    
    document.getElementById('success-modal').classList.remove('hidden');
}

function closeSuccessModal() {
    document.getElementById('success-modal').classList.add('hidden');
    window.location.href = '/';
}

function clearCart() {
    localStorage.removeItem('cartData');
    localStorage.removeItem('cartTotal');
}
</script>
@endsection 