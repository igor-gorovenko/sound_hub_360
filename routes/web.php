<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])
    ->name('index');

Route::get('/filter/{category}', [HomeController::class, 'filterByCategory'])
    ->name('index.filter')
    ->where('category', '[a-zA-Z0-9_-]+');
