<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use App\Models\Video;

class AdminDashboardController extends Controller
{
    public function index()
    {
        
        $latestMusic = Music::latest()->take(5)->get();
        $latestVideos = Video::latest()->take(5)->get();

        return view('admin.dashboard', compact('latestMusic', 'latestVideos'));
    }
}
