<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TokenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/home', function () {
    return redirect('/');
});

// Find Stays routes
Route::get('/find-stays', [App\Http\Controllers\FindStaysController::class, 'index'])->name('findStays');
Route::get('/find-stays/search', [App\Http\Controllers\FindStaysController::class, 'search'])->name('findStays.search');

Route::get('/planTour', function () {
    return view('pages.mainPlanTour');
})->name('planTour');

// Add new route for all packages page
Route::get('/packages', function () {
    return view('pages.allPackages');
})->name('all.packages');

// Add missing routes for hero buttons
Route::get('/car-rent', function () {
    return view('pages.carRent');
})->name('carRent');

// Add car rent search route
Route::get('/car-rent/search', function () {
    // This will be replaced with a controller method later
    return view('pages.carRent');
})->name('carRent.search');

Route::get('/get-guide', function () {
    return view('pages.getGuide');
})->name('getGuide');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

// Routes that require authentication
Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    
    // User profile routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
    // Admin routes - we'll check the admin role inside the controller instead
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
        Route::post('/users/{user}/update', [AdminController::class, 'updateUser'])->name('admin.users.update');
    });

    // Token management routes
    Route::get('/tokens', [TokenController::class, 'index'])->name('token.index');
    Route::post('/tokens', [TokenController::class, 'store'])->name('token.store');
    Route::delete('/tokens/{token}', [TokenController::class, 'destroy'])->name('token.destroy');
});
