<?php

use App\Livewire\Customers\CustomerForm;
use App\Livewire\Customers\CustomerIndex;
use App\Livewire\Dashboard;
use App\Livewire\Orders\OrderCreate;
use App\Livewire\Orders\OrderIndex;
use App\Livewire\Orders\OrderShow;
use App\Livewire\Products\ProductForm;
use App\Livewire\Products\ProductIndex;
use App\Http\Controllers\OrderPdfController;

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
    ->name('customers.index');
Route::get('/customerform', CustomerForm::class)
    ->middleware(['auth'])
    ->name('customers.form');
Route::get('/customer/{customer}/edit', CustomerForm::class)
    ->middleware(['auth'])
    ->name('customers.edit');

Route::view('/', 'welcome');

//order
Route::get('/orders', OrderIndex::class)
    ->middleware(['auth'])
    ->name('orders.index');

Route::get('/ordersForm', OrderCreate::class)
    ->middleware(['auth'])
    ->name('orders.create');

//
Route::get('dashboard', Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('/orders/{order}', OrderShow::class)
    ->middleware(['auth'])
    ->name('orders.show');



Route::get('/orders/{order}/pdf', [OrderPdfController::class, 'download'])
    ->middleware(['auth'])
    ->name('orders.pdf');
require __DIR__ . '/auth.php';
