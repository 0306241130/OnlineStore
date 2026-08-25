<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("home.index");
Route::get("/about", [HomeController::class, "about"])->name("home.about");

// Route::get("/products", 'App\Http\Controllers\ProductController@index')->name('product.index');
// Route::get('products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

// Route::get("/product/create", [ProductController::class, "create"])->name('product.create');
// Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

// Tuyến quản lý Thùng rác (Phải đặt TRƯỚC Route resource để tránh bị ghi đè)
Route::prefix('products')->name('products.')->controller(ProductController::class)->group(function (){
 Route::get('/trash','trash')->name('trash');
 Route::post('/{id}/restore','restore')->name('restore');
 Route::delete('/{id}/force-delete','forcedelete');
});
// Tuyến CRUD tự động (index, create, store, show, edit, update, destroy)
Route::resource('products',ProductController::class);


