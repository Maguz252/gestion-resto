<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return 'Bienvenido, admin';
})->middleware(['auth', 'admin']);



Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
