<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class,'home'])->name('home');
Route::get('/categoryproducts/{catid}',[PagesController::class,'categoryprouducts'])->name('categoryproducts');
Route::get('/viewproduct/{id}',[PagesController::class,'viewproduct'])->name('viewproduct');

Route::get('/dashboard', [DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function(){

    //Category Routes
    Route::get('/category',[CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create',[CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store',[CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/{id}/update',[CategoryController::class, 'update'])->name('category.update');
    Route::post('/category/destroy',[CategoryController::class,'destroy'])->name('category.destroy');

    //Product Routes
    Route::get('/products',[ProductController::class, 'index'])->name('product.index');
    Route::get('/products/create',[ProductController::class, 'create'])->name('product.create');
    Route::post('/products/store',[ProductController::class, 'store'])->name('product.store');
    Route::get('/products/{id}/edit',[ProductController::class, 'edit'])->name('product.edit');
    Route::post('/products/{id}/update',[ProductController::class, 'update'])->name('product.update');
    Route::post('/products/destroy',[ProductController::class,'destroy'])->name('product.destroy');

});
    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
