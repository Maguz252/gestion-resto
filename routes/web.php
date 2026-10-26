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

Route::get('/', function () {
    return redirect()->route('login');
});
Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', Dashboard::class)->middleware('verified')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
    // --- RUTAS DE PRODUCTOS uwu---
    Route::get('/products', ProductIndex::class)->name('products.index');
    Route::get('/products/create', ProductForm::class)->name('products.create');
    Route::get('/products/{product}/edit', ProductForm::class)->name('products.edit');
    // --- RUTAS DE CLIENTES :v ---
    Route::get('/customers', CustomerIndex::class)->name('customers.index');
    Route::get('/customers/create', CustomerForm::class)->name('customers.create');
    Route::get('/customers/{customer}/edit', CustomerForm::class)->name('customers.edit');
    // --- RUTAS DE ORDENES xd ---
    Route::get('/orders', OrderIndex::class)->name('orders.index');
    Route::get('/orders/create', OrderCreate::class)->name('orders.create');
    Route::get('/orders/{order}/pdf', [OrderPdfController::class, 'download'])->name('orders.pdf');
    Route::get('/orders/{order}', OrderShow::class)->name('orders.show');
});

require __DIR__ . '/auth.php';
