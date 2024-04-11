<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [AuthController::class, 'register']);;
Route::get('/verify-email/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
Route::get('verify-waiting', [AuthController::class, 'verifyWaiting']);
