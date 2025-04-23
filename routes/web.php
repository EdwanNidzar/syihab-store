<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/events', [LandingController::class, 'events'])->name('events');
Route::get('/credits', [LandingController::class, 'credits'])->name('credits');
Route::get('/price-list/{slug}', function ($slug) {
    return view('landing.pricelist', compact('slug'));
})->name('price-list');


Route::get('/products', [LandingController::class, 'products'])->name('products');
Route::get('/products/{slug}', [LandingController::class, 'productDetail'])->name('product-detail');