<?php

use App\Livewire\Products\ProductForm;
use App\Livewire\Products\ProductIndex;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return 'Bienvenido, admin';
})->middleware(['auth', 'admin']);

Route::get('/products', ProductIndex::class)
    ->middleware(['auth'])
    ->name('products.index');

Route::get('/productform', ProductForm::class)
    ->middleware(['auth'])
    ->name('products.form');

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
