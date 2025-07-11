<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes - Optimized for React SPA
|--------------------------------------------------------------------------
|
| Todas las rutas del frontend son manejadas por React Router.
| Solo mantenemos las rutas API necesarias para el funcionamiento.
|
*/

use App\Http\Controllers\Api\VisitLogController;

// API de Registro de Visitas
Route::post('/api/visit-log', [VisitLogController::class, 'store'])->name('api.visit.log');

// ===== RUTAS API PÚBLICAS (Sin autenticación) =====

// API de Autenticación
Route::prefix('api/auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('api.auth.login');
    Route::post('/register', [AuthController::class, 'register'])->name('api.auth.register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.auth.logout');
    Route::get('/user', [AuthController::class, 'user'])->name('api.auth.user');
    Route::get('/check', [AuthController::class, 'check'])->name('api.auth.check');
    Route::post('/update-activity', [AuthController::class, 'updateActivity'])->name('api.auth.update-activity');
    Route::post('/validate-password', [AuthController::class, 'validatePassword'])->name('api.auth.validate-password');
});

// API de Restablecimiento de Contraseña
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');

// API de Reseñas (públicas para el landing)
Route::prefix('api/reviews')->group(function () {
    Route::get('/', [ReviewController::class, 'index'])->name('api.reviews.index');
    Route::post('/', [ReviewController::class, 'store'])->name('api.reviews.store');
    Route::get('/eligibility', [ReviewController::class, 'checkEligibility'])->name('api.reviews.eligibility');
    Route::get('/statistics', [ReviewController::class, 'statistics'])->name('api.reviews.statistics');
    Route::get('/rating/{rating}', [ReviewController::class, 'getByRating'])->name('api.reviews.by-rating');
    Route::get('/recent', [ReviewController::class, 'getRecent'])->name('api.reviews.recent');
});

// API de Contacto (formulario público)
Route::prefix('api/contact')->group(function () {
    Route::post('/', [ContactController::class, 'store'])->name('api.contact.store');
    Route::get('/info', [ContactController::class, 'getInfo'])->name('api.contact.info');
});

// API de Menú (datos del menú público)
Route::get('/api/menu', function () {
    // TODO: Implementar controlador del menú
    return response()->json([
        'categories' => [
            ['id' => 1, 'name' => 'Birria', 'description' => 'Tradicional birria jalisciense'],
            ['id' => 2, 'name' => 'Tacos', 'description' => 'Tacos artesanales'],
            ['id' => 3, 'name' => 'Tortas', 'description' => 'Tortas ahogadas'],
            ['id' => 4, 'name' => 'Bebidas', 'description' => 'Bebidas refrescantes'],
            ['id' => 5, 'name' => 'Guarniciones', 'description' => 'Acompañamientos'],
        ]
    ]);
})->name('api.menu');

// API de Ubicaciones (datos de sucursales públicas)
Route::get('/api/locations', function () {
    // TODO: Implementar controlador de ubicaciones
    return response()->json([
        'locations' => [
            [
                'id' => 1,
                'name' => 'Casa Jalisco - Centro',
                'address' => 'Calle Principal 123, Centro, Nogales',
                'phone' => '(631) 123-4567',
                'hours' => 'Lun-Dom: 8:00 AM - 10:00 PM',
                'coordinates' => ['lat' => 31.3402, 'lng' => -110.9342]
            ],
            [
                'id' => 2,
                'name' => 'Casa Jalisco - Norte',
                'address' => 'Av. Tecnológico 456, Col. Norte, Nogales',
                'phone' => '(631) 123-4568',
                'hours' => 'Lun-Dom: 9:00 AM - 11:00 PM',
                'coordinates' => ['lat' => 31.3500, 'lng' => -110.9400]
            ]
        ]
    ]);
})->name('api.locations');

// ===== RUTAS PROTEGIDAS (Con autenticación) =====

Route::middleware(['auth'])->group(function () {
    // API de perfil de usuario
    Route::get('/api/profile', function () {
        return response()->json(['user' => auth()->user()]);
    })->name('api.profile');
    
    // API de órdenes de usuario
    Route::get('/api/orders', function () {
        // TODO: Implementar controlador de órdenes
        return response()->json(['orders' => []]);
    })->name('api.orders');
});

// ===== RUTAS ADMINISTRATIVAS (Solo para administradores) =====

Route::middleware(['auth', 'admin'])->prefix('api/admin')->group(function () {
    Route::get('/reviews', [ReviewController::class, 'adminIndex'])->name('api.admin.reviews');
    Route::get('/orders', function () {
        // TODO: Implementar controlador admin de órdenes
        return response()->json(['orders' => []]);
    })->name('api.admin.orders');
    Route::get('/users', function () {
        // TODO: Implementar controlador admin de usuarios
        return response()->json(['users' => []]);
    })->name('api.admin.users');
});

// ===== RUTAS LEGACY (Para compatibilidad temporal) =====

// Redireccionamientos de rutas antiguas
Route::redirect('/home', '/', 301);
Route::redirect('/about-us', '/about', 301);
Route::redirect('/order-online', '/', 301);
Route::redirect('/catering', '/contact', 301);
Route::redirect('/birria', '/menu', 301);
Route::redirect('/sopes', '/menu', 301);
Route::redirect('/comida-jalisciense', '/menu', 301);
Route::redirect('/catenos', '/contact', 301);

// ===== REACT ROUTER SPA =====

// Catch-all route: DEBE ir al final para manejar todas las rutas de React
Route::get('/{any}', function () {
    return view('layouts.app');
})->where('any', '.*')->name('react.app');

// ===== MANEJO DE ERRORES =====

// Fallback para rutas no encontradas (404)
/*
Route::fallback(function () {
    return view('layouts.app'); // React maneja el 404
});
*/
