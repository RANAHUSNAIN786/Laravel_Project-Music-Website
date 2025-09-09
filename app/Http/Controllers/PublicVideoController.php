<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class PublicVideoController extends Controller
{
    // Homepage videos (already used by HomePageController)
    public function index()
    {
        $videos = Video::latest()->take(4)->get();
        $music = collect();
        return view('user.index', compact('music', 'videos'));
    }

    // Single Video Details
   public function show($id)
{
    $video = Video::findOrFail($id);
    $related = Video::where('id', '!=', $id)->latest()->take(6)->get();
    return view('user.video-details', compact('video', 'related'));
}

}
