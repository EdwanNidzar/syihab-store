<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CTAClickController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/events', [LandingController::class, 'events'])->name('events');
Route::get('/credits', [LandingController::class, 'credits'])->name('credits');
Route::get('/price-list/{slug}', function ($slug) {
    return view('landing.pricelist', compact('slug'));
})->name('price-list');


Route::get('/product', [LandingController::class, 'product'])->name('product');
Route::get('/products', [LandingController::class, 'products'])->name('products');
Route::get('/product/{slug}', [LandingController::class, 'productDetail'])->name('product-detail');

Route::get('/brands', [LandingController::class, 'brands'])->name('brands');
Route::get('/brand/product/{slug}', [LandingController::class, 'brandDetail'])->name('brand-detail');

Route::get('/products/category/{category}', [LandingController::class, 'productsByCategory'])
     ->name('products.category');

//route for the click tracking
Route::post('/track-click', [CTAClickController::class, 'trackClick']);