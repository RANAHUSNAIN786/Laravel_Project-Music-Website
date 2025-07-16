<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class PublicVideoController extends Controller
{
    public function index()
    { 
        $videos = Video::latest()->take(4)->get();
        $music = collect(); // Safe fallback if not using music

        return view('user.index', compact('music', 'videos'));
    }
}
