<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public API routes
Route::post('/tokens/create', [TokenController::class, 'createToken']);

// Protected API routes
Route::middleware('auth:sanctum')->group(function () {
    // User information
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    // Add more API endpoints here...
});
