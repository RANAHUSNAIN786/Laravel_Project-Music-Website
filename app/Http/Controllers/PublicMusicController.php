<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class PublicMusicController extends Controller
{
    // Homepage music (already used by HomePageController)
    public function index()
    {
        $music = Music::latest()->take(4)->get();
        $videos = collect(); // fallback
        return view('user.index', compact('music', 'videos'));
    }

    // Single Music Details
   public function show($id)
{
    $music = Music::findOrFail($id);
    $related = Music::where('id', '!=', $id)->latest()->take(6)->get();
    return view('user.music-details', compact('music', 'related'));
}

}
