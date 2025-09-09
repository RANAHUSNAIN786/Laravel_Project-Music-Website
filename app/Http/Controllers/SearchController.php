<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Video;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function ajaxSearch(Request $request)
    {
        $query = $request->get('q');

        // Music search
        $music = Music::where('title', 'like', "%{$query}%")
            ->orWhere('artist', 'like', "%{$query}%")
            ->orWhere('album', 'like', "%{$query}%")
            ->orWhere('year', 'like', "%{$query}%")
            ->orWhere('genre', 'like', "%{$query}%")
            ->take(5)
            ->get(['id', 'title', 'artist', 'album', 'year', 'genre', 'cover_image'])
            ->map(function ($item) {
                $item->link = route('music.details', $item->id); 
                return $item;
            });

        // Video search
        $videos = Video::where('title', 'like', "%{$query}%")
            ->orWhere('artist', 'like', "%{$query}%")
            ->orWhere('album', 'like', "%{$query}%")
            ->orWhere('year', 'like', "%{$query}%")
            ->orWhere('category', 'like', "%{$query}%")
            ->take(5)
            ->get(['id', 'title', 'artist', 'album', 'year', 'category', 'thumbnail'])
            ->map(function ($item) {
                $item->link = route('video.details', $item->id); 
                return $item;
            });

        return response()->json([
            'music' => $music,
            'videos' => $videos,
        ]);
    }
}
