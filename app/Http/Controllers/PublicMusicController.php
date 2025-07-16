<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class PublicMusicController extends Controller
{
      public function index()
    {
    $music = Music::latest()->take(4)->get();
    $videos = collect(); // empty collection to avoid error
    return view('user.index', compact('music', 'videos'));
    }
}
