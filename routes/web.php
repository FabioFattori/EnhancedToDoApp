<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get("/login", function () {
   return Inertia::render('Auth/Login');
});

Route::get('/', function () {
    return Inertia::render('Welcome/Index');
})->name('home');

Route::get('/settings', function () {
    return Inertia::render('Welcome/Index');
})->name('settings');