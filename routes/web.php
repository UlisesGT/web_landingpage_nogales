<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/menu', function () {
    return view('pages.menu');
})->name('menu');

Route::get('/order-online', function () {
    return view('pages.order-online');
})->name('order-online');

Route::get('/catering', function () {
    return view('pages.catering');
})->name('catering');

Route::get('/about-us', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.catenos');
})->name('contact');

Route::get('/checkout', function () {
    return view('pages.checkout');
})->name('checkout');

Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::get('/register', function () {
    return view('pages.register');
})->name('register');

// Password Reset Routes
Route::get('/forgot-password', function () {
    return view('pages.forgot-password');
})->name('forgot-password');

Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('pages.reset-password', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');

// Review Routes
Route::get('/api/reviews', [ReviewController::class, 'getReviews'])->name('api.reviews.index');
Route::post('/api/reviews', [ReviewController::class, 'store'])->name('api.reviews.store');
Route::get('/api/reviews/check-eligibility', [ReviewController::class, 'checkEligibility'])->name('api.reviews.eligibility');
Route::post('/api/simulate-order', [ReviewController::class, 'simulateOrder'])->name('api.simulate.order');
Route::post('/api/save-user-session', [ReviewController::class, 'saveUserSession'])->name('api.save.user.session');
Route::post('/api/complete-order', [ReviewController::class, 'completeOrder'])->name('api.complete.order');

// Rutas legacy para compatibilidad
Route::get('/birria', function () {
    return view('pages.birria');
})->name('birria');

Route::get('/sopes', function () {
    return view('pages.sopes');
})->name('sopes');

Route::get('/comida-jalisciense', function () {
    return view('pages.comida-jalisciense');
})->name('comida-jalisciense');

Route::get('/catenos', function () {
    return view('pages.catenos');
})->name('catenos');
