<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::get('/register-page', function () {
    return view('pages/auth/register');
});

// Auth Controller
Route::post('/register', [AuthController::class, 'register']);
Route::get('/verify-email/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
Route::get('/verify-waiting', [AuthController::class, 'emailVerifyRedirect']);
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'submitForgotPasswordForm'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('password.update');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->withoutMiddleware('auth')->name('login');
// Resend Email
Route::get('/resend-email', [AuthController::class, 'resendEmailVerification']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/', [DashboardController::class, 'app'])->name('app');
    Route::get('/profile-page', [ProfileController::class, 'profilePage'])->name('profile-page');
    Route::post('/post', [PostController::class, 'create'])->name('post');
    Route::delete('/post/{post}/delete', [PostController::class, 'deletePost'])->name('delete.post');
    Route::put('/edit-post/{post}', [PostController::class, 'editPost'])->name('edit.post');
    Route::get('/edit-post/{post}', [PostController::class, 'viewPost'])->name('view.post');
    Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/post/{post}/like', [PostController::class, 'like'])->name('like.post');
    Route::post('/post/{post}/unlike', [PostController::class, 'unlike'])->name('unlike.post');
});
