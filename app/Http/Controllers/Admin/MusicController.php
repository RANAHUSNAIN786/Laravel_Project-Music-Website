<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Music;

class MusicController extends Controller
{
    // Show all music entries (admin.music.blade.php)
    public function index()
    {
        $music = Music::latest()->get();
        return view('admin.music', compact('music'));
    }

    // Store new music entry
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

        $audioPath = $request->file('audio_file')->store('uploads/music', 'public');

        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('uploads/covers', 'public');
        }

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

    // Show the form to edit a single music entry
    public function edit($id)
    {
        $music = Music::findOrFail($id);
        return view('admin.editmusic', compact('music'));
    }

    // Update a music entry
    public function update(Request $request, $id)
    {
        $music = Music::findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'artist' => 'required|string',
            'album' => 'nullable|string',
            'year' => 'nullable|numeric',
            'genre' => 'nullable|string',
            'cover_image' => 'nullable|image',
            'audio_file' => 'nullable|file|mimes:mp3',
            'description' => 'nullable|string',
        ]);

        $music->title = $request->title;
        $music->artist = $request->artist;
        $music->album = $request->album;
        $music->year = $request->year;
        $music->genre = $request->genre;
        $music->description = $request->description;

        if ($request->hasFile('cover_image')) {
            $music->cover_image = $request->file('cover_image')->store('uploads/covers', 'public');
        }

        if ($request->hasFile('audio_file')) {
            $music->audio_file = $request->file('audio_file')->store('uploads/music', 'public');
        }

        $music->save();

        return redirect()->route('music.index')->with('success', 'Music updated successfully!');
    }

  public function deleteView()
{
    $music = Music::latest()->get();
    return view('admin.deletemusic', compact('music'));
}

public function editView()
{
    $music = Music::latest()->get();
    return view('admin.editmusiclist', compact('music')); // ← updated name
}

public function allMusicView()
{
    $music = Music::latest()->get();
    return view('admin.allmusic', compact('music'));
}



public function destroy($id)
{
    $music = Music::findOrFail($id);
    $music->delete();

    return redirect()->route('music.deleteview')->with('success', 'Music deleted successfully!');
}

}
