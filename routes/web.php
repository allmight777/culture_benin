<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PrincipaleController;
use App\Http\Controllers\PaymentController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/accueil', [AccueilController::class, 'index'])->name('accueil');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Afficher le formulaire
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.create');
// Soumettre le formulaire
Route::post('/register', [AuthController::class, 'register'])->name('register.perform');

// routes/web.php
Route::middleware(['auth'])->group(function () {
    // API rapide
    Route::post('/payment/initiate', [PaymentController::class, 'initiatePayment'])
        ->name('payment.initiate');
    
    Route::post('/payment/check-access', [PaymentController::class, 'checkAccess'])
        ->name('payment.checkAccess');
    
    Route::get('/payment/check/{id}', [PaymentController::class, 'checkPayment'])
        ->name('payment.check');
});

// Callback accessible sans auth
Route::get('/payment/callback', [PaymentController::class, 'paymentCallback'])
    ->name('payment.callback');


// routes/api.php
// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::post('/payment/initiate', [PaymentController::class, 'initiatePayment']);
//     Route::post('/payment/check-access', [PaymentController::class, 'checkAccess']);
// });

// Routes pour le contenu gratuit

// Routes pour les paiements
// Route::post('/payment/initiate', [PaymentController::class, 'initiate'])->name('payment.initiate');
// Route::post('/payment/check-access', [PaymentController::class, 'checkAccess'])->name('payment.check-access');
// Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
// Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

Route::controller(PrincipaleController::class)->group(function () {
    Route::get('/',        'home')->name('home');
    Route::get('/about',   'about')->name('about');
    Route::get('/domaines','domaines')->name('domaines');
    Route::get('/langues', 'langues')->name('langues');
    Route::get('/regions', 'regions')->name('regions');
    Route::get('/content', 'content')->name('content');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/contact', 'contact')->name('contact');
});

// Routes d'authentification
// Auth::routes();

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


// inclure les autres groupes (front/admin) si tu veux les charger depuis ici
require __DIR__.'/front.php';
require __DIR__.'/admin.php';
