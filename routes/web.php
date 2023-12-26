<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])
    ->name('index');

Route::get('/category/{slug}', [HomeController::class, 'showCategory'])
    ->name('category.show')
    ->where('slug', '[a-zA-Z0-9_-]+');
