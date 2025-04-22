<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/events', [LandingController::class, 'events'])->name('events');
Route::get('/credits', [LandingController::class, 'credits'])->name('credits');