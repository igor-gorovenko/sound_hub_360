<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sound;

class HomeController extends Controller
{
    public function index()
    {
        $sounds = Sound::all();
        $categories = $sounds->unique('category')->pluck('category')->toArray();

        return view('webapp.index', compact('sounds', 'categories'));
    }

    public function filterByCategory(Request $request, $category)
    {
        $filteredSounds = Sound::where('category', $category)->get();

        return response()->json($filteredSounds);
    }
}
