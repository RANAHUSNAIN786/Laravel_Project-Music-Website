<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Video;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
     public function index()
    {
        $videos = class_exists(Video::class) ? Video::latest()->take(4)->get() : collect();
        $music = class_exists(Music::class) ? Music::latest()->take(4)->get() : collect();

        return view('user.index', compact('music', 'videos'));
    }
}
