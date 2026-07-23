<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("home.index");
Route::get("/about", [HomeController::class, "about"])->name("home.about");

Route::get("/products", 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
