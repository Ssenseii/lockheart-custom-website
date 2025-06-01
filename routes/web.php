<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ReferencesController;
use App\Http\Controllers\ContactController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('/references', [ReferencesController::class, 'index'])->name('references');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/services/{slug}', [ServicesController::class, 'show'])->name('service.show');

Route::get('/products/{slug}', [ProductsController::class, 'show'])->name('product.show');
Route::post('/product/buy', [ProductsController::class, 'buy'])->name('product.buy');

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');


