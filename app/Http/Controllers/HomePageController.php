<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Video;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    // Homepage
    public function index()
    {
        $music  = Music::latest()->take(4)->get();
        $videos = Video::latest()->take(4)->get();

        return view('user.index', compact('music', 'videos'));
    }

    // All Music (Track Page)
   public function trackPage()
{
    $music  = Music::latest()->paginate(12);   
    $videos = Video::latest()->take(8)->get(); 
    return view('user.track', compact('music', 'videos'));
}


    // All Videos (Video List Page)
    public function videoPage()
    {
        $videos = Video::latest()->paginate(12);
        return view('user.videos', compact('videos'));
    }
}
