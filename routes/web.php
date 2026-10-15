<?php

use App\Livewire\Customers\CustomerForm;
use App\Livewire\Customers\CustomerIndex;
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


// Ruta para EDITAR
Route::get('/products/{product}/edit', ProductForm::class)
    ->middleware(['auth'])
    ->name('products.edit');
//ruta para el cliente
Route::get('/customers', CustomerIndex::class)
    ->middleware(['auth'])
    ->name('customer.index');
Route::get('/customerform', CustomerForm::class)
    ->middleware(['auth'])
    ->name('customer.form');
Route::get('/customer/{customer}/edit', CustomerForm::class)
    ->middleware(['auth'])
    ->name('customer.edit');

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
