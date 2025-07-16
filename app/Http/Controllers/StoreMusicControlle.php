<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;

class StoreMusicControlle extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'audio_file' => 'required|file|mimes:mp3',
            'title' => 'required|string',
            'artist' => 'required|string',
            'album' => 'nullable|string',
            'year' => 'nullable|numeric',
            'genre' => 'nullable|string',
            'cover_image' => 'nullable|image',
            'description' => 'nullable|string',
        ]);

        // Handle audio file
        $audioPath = $request->file('audio_file')->store('uploads/music', 'public');

        // Handle cover image (if any)
        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('uploads/covers', 'public');
        }

        // Save to database
        Music::create([
            'title' => $request->title,
            'artist' => $request->artist,
            'album' => $request->album,
            'year' => $request->year,
            'genre' => $request->genre,
            'audio_file' => $audioPath,
            'cover_image' => $coverPath,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Music uploaded successfully!');
    }
}
