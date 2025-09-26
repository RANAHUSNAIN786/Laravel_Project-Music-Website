<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
class VideoController extends Controller
{
    /**
     * Show all videos (index).
     */
    public function index()
    {
        $videos = Video::latest()->get();
        return view('admin.allvideo', compact('videos'));
    }

    /**
     * Store a new video.
     */
    public function store(Request $request)
    {
        $request->validate([
            'video_file'   => 'nullable|file|mimes:mp4',
            'youtube_url'  => 'nullable|url',
            'title'        => 'required|string',
            'artist'       => 'required|string',
            'album'        => 'nullable|string',
            'year'         => 'nullable|numeric',
            'category'     => 'nullable|string',
            'thumbnail'    => 'nullable|image',
            'description'  => 'nullable|string',
        ]);

        $video = new Video();

        if ($request->hasFile('video_file')) {
            $video->video_file = $request->file('video_file')->store('uploads/videos', 'public');
        }

        if ($request->hasFile('thumbnail')) {
            $video->thumbnail = $request->file('thumbnail')->store('uploads/thumbnails', 'public');
        }

        $video->youtube_url = $request->youtube_url;
        $video->title = $request->title;
        $video->artist = $request->artist;
        $video->album = $request->album;
        $video->year = $request->year;
        $video->category = $request->category;
        $video->description = $request->description;

        $video->save();

        return back()->with('success', 'Video uploaded successfully!');
    }

    /**
     * Show form for editing a single video.
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.editvideo', compact('video'));
    }

    /**
     * Update a video entry.
     */
    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $request->validate([
            'video_file'   => 'nullable|file|mimes:mp4',
            'youtube_url'  => 'nullable|url',
            'title'        => 'required|string',
            'artist'       => 'required|string',
            'album'        => 'nullable|string',
            'year'         => 'nullable|numeric',
            'category'     => 'nullable|string',
            'thumbnail'    => 'nullable|image',
            'description'  => 'nullable|string',
        ]);

        if ($request->hasFile('video_file')) {
            $video->video_file = $request->file('video_file')->store('uploads/videos', 'public');
        }

        if ($request->hasFile('thumbnail')) {
            $video->thumbnail = $request->file('thumbnail')->store('uploads/thumbnails', 'public');
        }

        $video->youtube_url = $request->youtube_url;
        $video->title = $request->title;
        $video->artist = $request->artist;
        $video->album = $request->album;
        $video->year = $request->year;
        $video->category = $request->category;
        $video->description = $request->description;

        $video->save();

        return redirect()->route('video.editview')->with('success', 'Video updated successfully!');
    }

    /**
     * Show all videos on a delete page.
     */
    public function deleteView()
    {
        $videos = Video::latest()->get();
        return view('admin.deletevideo', compact('videos'));
    }

    /**
     * Show all videos with edit buttons.
     */
    public function editView()
    {
        $videos = Video::latest()->get();
        return view('admin.editvideolist', compact('videos'));
    }

    /**
     * Delete a video.
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return back()->with('success', 'Video deleted successfully!');
    }

   
}
