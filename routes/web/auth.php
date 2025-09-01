<?php

use App\Presentation\Users\Controllers\AuthController;

Route::get("/login", [AuthController::class, "loginIndex"])->name('login');
Route::get("/register", [AuthController::class, "registerIndex"])->name('register');

Route::post('/attempt-login',[AuthController::class, 'login'])->name('login-attempt');
Route::post('/attempt-register',[AuthController::class, 'register'])->name('login-register');
