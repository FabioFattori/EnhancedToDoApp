<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome/index',["exampleData" => "VENGO DAL BACKEND"]);
})->name('home');

Route::get('/other', function () {
    return Inertia::render('Welcome/Other');
})->name('other');
