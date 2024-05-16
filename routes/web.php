<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResikaController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[ResikaController::class,'index']);

Route::get('/dashboard',[ResikaController::class,'dashboard']);

Route::controller(ProductController::class)->prefix('product')->group(function ( ) {
    Route::get('', 'index')->name('products');
    Route::get('create', 'create')->name('products.create');
    Route::post('store', 'store')->name('products.store');
    Route::get('show/{id}', 'show')->name('products.show');
    Route::get('edit/{id}', 'edit')->name('products.edit');
    Route::put('edit/{id}', 'update')->name('products.update');
    Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
});