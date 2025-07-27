<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesRecordController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* -------------------------------------------------------------------------- */
/*                               Customer Module                              */
/* -------------------------------------------------------------------------- */
// Sales and Officer can manage customers
Route::controller(CustomerController::class)
    ->middleware(['auth', 'verified', 'role:sales,officer'])
    ->group(function () {
        Route::get('/dashboard/customers', 'index')->name("customer.index");
        Route::get('/dashboard/customers/{id}', 'show')->name('customer.show');
        Route::get('/dashboard/customer/create', 'create')->name('customer.create');
        Route::post('/dashboard/customer', 'store')->name('customer.store');
        Route::get('/dashboard/customers/{id}/edit', 'edit')->name('customer.edit');
        Route::put('/dashboard/customers/{id}', 'update')->name('customer.update');
        Route::delete('/customers/{customer}', 'destroy')->name('customer.destroy');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
