<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('app');
});
Route::get('/register-page', function () {
    return view('pages/auth/register');
});

// Auth Controller
Route::post('/register', [AuthController::class, 'register']);
Route::get('/verify-email/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
Route::get('/verify-waiting', [AuthController::class, 'emailVerifyRedirect']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Login
Route::post('/login', [AuthController::class, 'login'])->withoutMiddleware('auth')->name('login');
// Resend Email
Route::get('/resend-email', [AuthController::class, 'resendEmailVerification']);

//Authh
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    // Profile Page
    Route::get('/profile-page', [ProfileController::class, 'profilePage'])->name('profile-page'); 
});

//Posts Routes
Route::post('/post', [PostController::class, 'create']);
