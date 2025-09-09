<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use App\Models\User;
use App\Models\Video;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Latest 5 Music aur Videos
        $latestMusic  = Music::latest()->take(5)->get();
        $latestVideos = Video::latest()->take(5)->get();

        // Counts
        $userCount  = User::count();
        $musicCount = Music::count();
        $videoCount = Video::count();

        // Storage Path
        $musicPath = storage_path('app/public/uploads/music');
        $videoPath = storage_path('app/public/uploads/videos');

        $totalSizeBytes = 0;

        if (is_dir($musicPath)) {
            foreach (new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($musicPath)) as $file) {
                if ($file->isFile()) {
                    $totalSizeBytes += $file->getSize();
                }
            }
        }

        if (is_dir($videoPath)) {
            foreach (new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($videoPath)) as $file) {
                if ($file->isFile()) {
                    $totalSizeBytes += $file->getSize();
                }
            }
        }

        if ($totalSizeBytes >= 1073741824) {
            $totalSize = number_format($totalSizeBytes / 1073741824, 2) . ' GB';
        } else {
            $totalSize = number_format($totalSizeBytes / 1048576, 2) . ' MB';
        }

        return view('admin.dashboard', compact(
            'latestMusic',
            'latestVideos',
            'userCount',
            'musicCount',
            'videoCount',
            'totalSize'
        ));
    }
}
