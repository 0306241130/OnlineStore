<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 2. Nhóm Route bảo mật (Protected) - Phải đăng nhập mới vào được
Route::middleware('auth')->group(function () {
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [
        ProductController::class,
        'edit'
    ])->name('products.edit');
    Route::put('/products/{product}', [
        ProductController::class,
        'update'
    ])->name('products.update');
    Route::delete('/products/{product}', [
        ProductController::class,
        'destroy'
    ])->name('products.destroy');
});

Route::prefix('products')->name('products.')->controller(ProductController::class)->group(function () {
    Route::get('/trash', 'trash')->name('trash');
    Route::post('/{id}/restore', 'restore')->name('restore');
    Route::delete('/{id}/force-delete', 'forcedelete')->name('forcedelete');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');






require __DIR__ . '/auth.php';
