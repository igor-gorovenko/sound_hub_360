<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sound;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $sounds = Sound::all();
        $categories = Category::all();

        return view('index', compact('categories', 'sounds'));
    }

    public function showCategory($slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->first();
        $sounds = Sound::where('category_id', $category->id)->get();

        return view('index', compact('categories', 'sounds'));
    }

    public function timerFinished(Request $request)
    {
        Sound::where('is_playing', true)->update(['is_playing' => false]);

        return response()->json(['status' => 'success']);
    }
}
