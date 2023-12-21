<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoundController;

Route::get('/', function () {
    return view('webapp.index');
});

Route::get('/playback', [SoundController::class, 'playback']);
