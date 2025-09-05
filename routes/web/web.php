<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware("auth")->group(function () {
    Route::get('/', function () {
        return Inertia::render('Welcome/Index');
    })->name('home');

    Route::get('/settings', function () {
        return Inertia::render('Welcome/Index');
    })->name('settings');
});
