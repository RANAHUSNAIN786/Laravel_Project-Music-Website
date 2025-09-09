<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Music;
use Illuminate\Support\Facades\Storage;

class MusicController extends Controller
{
    // Show all music entries
    public function index()
    {
        $music = Music::latest()->get();
        return view('admin.music', compact('music'));
    }

    // Store new music entry
    public function store(Request $request)
    {
        $request->validate([
            'audio_file'   => 'required|file|mimes:mp3|max:20480',
            'title'        => 'required|string|max:255',
            'artist'       => 'required|string|max:255',
            'album'        => 'nullable|string|max:255',
            'year'         => 'nullable|numeric',
            'genre'        => 'nullable|string|max:100',
            'cover_image'  => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'description'  => 'nullable|string',
        ]);

        $audioPath = $request->file('audio_file')->store('uploads/music', 'public');

        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('uploads/covers', 'public');
        }

        Music::create([
            'title'       => $request->title,
            'artist'      => $request->artist,
            'album'       => $request->album,
            'year'        => $request->year,
            'genre'       => $request->genre,
            'audio_file'  => $audioPath,
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
            'title'       => 'required|string|max:255',
            'artist'      => 'required|string|max:255',
            'album'       => 'nullable|string|max:255',
            'year'        => 'nullable|numeric',
            'genre'       => 'nullable|string|max:100',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'audio_file'  => 'nullable|file|mimes:mp3|max:20480',
            'description' => 'nullable|string',
        ]);

        $music->fill($request->only(['title','artist','album','year','genre','description']));

        if ($request->hasFile('cover_image')) {
            if ($music->cover_image && Storage::disk('public')->exists($music->cover_image)) {
                Storage::disk('public')->delete($music->cover_image);
            }
            $music->cover_image = $request->file('cover_image')->store('uploads/covers', 'public');
        }

        if ($request->hasFile('audio_file')) {
            if ($music->audio_file && Storage::disk('public')->exists($music->audio_file)) {
                Storage::disk('public')->delete($music->audio_file);
            }
            $music->audio_file = $request->file('audio_file')->store('uploads/music', 'public');
        }

        $music->save();

        return redirect()->route('music.index')->with('success', 'Music updated successfully!');
    }

    // Delete view
    public function deleteView()
    {
        $music = Music::latest()->get();
        return view('admin.deletemusic', compact('music'));
    }

    // Edit list view
    public function editView()
    {
        $music = Music::latest()->get();
        return view('admin.editmusiclist', compact('music'));
    }

    // All music view
    public function allMusicView()
    {
        $music = Music::latest()->get();
        return view('admin.allmusic', compact('music'));
    }

    // Delete entry
    public function destroy($id)
    {
        $music = Music::findOrFail($id);

        if ($music->cover_image && Storage::disk('public')->exists($music->cover_image)) {
            Storage::disk('public')->delete($music->cover_image);
        }
        if ($music->audio_file && Storage::disk('public')->exists($music->audio_file)) {
            Storage::disk('public')->delete($music->audio_file);
        }

        $music->delete();

        return redirect()->route('music.deleteview')->with('success', 'Music deleted successfully!');
    }
}
