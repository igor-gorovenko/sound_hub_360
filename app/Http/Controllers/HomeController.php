<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sound;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Sound::pluck('category')->unique();
        $sounds = Sound::all();

        return view('index', compact('categories', 'sounds'));
    }

    public function filterByCategory($category)
    {
        $categories = Sound::pluck('category')->unique();
        $sounds = Sound::where('category', $category)->get();

        return view('index', compact('sounds', 'categories'));
    }
}
