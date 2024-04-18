<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
Route::get('/logout', [AuthController::class, 'logout']);
// Resend Email
Route::get('/resend-email', [AuthController::class, 'resendEmailVerification']);

// Dashboard Controller
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth');
