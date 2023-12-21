<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sound;

class HomeController extends Controller
{
    public function index()
    {
        $sounds = Sound::all();

        return view('webapp.index', compact('sounds'));
    }
}
