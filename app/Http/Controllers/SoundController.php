<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoundController extends Controller
{
    public function playback()
    {
        $sound = '';

        return view('playback', compact('sound'));
    }
}
