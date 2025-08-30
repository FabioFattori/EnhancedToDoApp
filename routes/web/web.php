<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::group(["middleware" => ["auth"]], function () {
    Route::get('/', function () {
        return Inertia::render('Welcome/Index');
    })->name('home');

    Route::get('/settings', function () {
        return Inertia::render('Welcome/Index');
    })->name('settings');
});