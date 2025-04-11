<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');





Route::get('/find-stays', function () {
    return view('pages.findStays');
})->name('findStays');


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



Route::get('/get-guide', function () {
    return view('pages.getGuide');
})->name('getGuide');


// Contact Booking Form Routes - Now requires authentication
Route::middleware('auth')->group(function() {
    // Replace with controller methods
    Route::get('/contact-booking', [BookingController::class, 'showForm'])->name('contact.booking.form');
    Route::post('/contact-booking/submit', [BookingController::class, 'store'])->name('contact.booking.submit');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

// Routes that require authentication
Route::middleware('auth')->group(function () {
    // Fix the logout route to use the controller method directly
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    
    // User profile routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
    // Admin routes 
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
        Route::post('/users/{user}/update', [AdminController::class, 'updateUser'])->name('admin.users.update');
        
        // New admin booking routes
        Route::get('/bookings', [BookingController::class, 'index'])->name('admin.bookings.index');
        Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('admin.bookings.show');
        Route::post('/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('admin.bookings.status');
        Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('admin.bookings.update');
    });

 
});
