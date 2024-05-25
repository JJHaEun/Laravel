<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/products',[ProductController::class, 'index'])->name('products.index');

Route::get('/products/create',[ProductController::class, 'create'])->name('products.create');
Route::post('/products/store',[ProductController::class, 'store'])->name('products.store');

// 상세
Route::get('/products/{product}',[ProductController::class, 'show'])->name('products.show');