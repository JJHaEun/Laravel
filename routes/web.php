<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadController;

Route::get('/', function () {
    return view('welcome');
});
// name 을 지정하면 해당 name으로 route또는 redirect할때 사용할 수 있음/


Route::get('/products',[ProductController::class, 'index'])->name('products.index');

Route::get('/products/create',[ProductController::class, 'create'])->name('products.create');
Route::post('/products/store',[ProductController::class, 'store'])->name('products.store');

// 상세
Route::get('/products/{product}',[ProductController::class, 'show'])->name('products.show');


// 수정: 1 수정 페이지를 불러옴
// 2  수정이 진행됨
Route::get('/products/{product}/edit',[ProductController::class, 'edit'])->name('products.edit');
Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');


// 논리적 삭제
Route::delete('/products/{product}', [ProductController::class, 'delete_yn'])->name('products.del_yn');



Route::get('/upload',[UploadController::class,'uploadForm'])->name('uploadForm');
Route::post('/upload',[UploadController::class,'uploadFile'])->name('upload.uploadFile');