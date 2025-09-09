@extends('admin.adminmain')

@section('title', 'Dashboard')

@section('content')
<!-- Dashboard Stats -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Music Card -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition-shadow duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Music</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $musicCount }}</p>
                <p class="text-sm text-green-600 dark:text-green-400 flex items-center mt-1">
                    <i class="fas fa-arrow-up text-xs mr-1"></i>
                    Active tracks
                </p>
            </div>
            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                <i class="fas fa-music text-blue-600 dark:text-blue-400 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Total Videos Card -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition-shadow duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Videos</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $videoCount }}</p>
                <p class="text-sm text-green-600 dark:text-green-400 flex items-center mt-1">
                    <i class="fas fa-arrow-up text-xs mr-1"></i>
                    Active videos
                </p>
            </div>
            <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                <i class="fas fa-video text-red-600 dark:text-red-400 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Total Users Card -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition-shadow duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Users</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $userCount }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center mt-1">
                    <i class="fas fa-users text-xs mr-1"></i>
                    Registered users
                </p>
            </div>
            <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                <i class="fas fa-users text-green-600 dark:text-green-400 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Storage Used Card -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition-shadow duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Storage Used</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $totalSize }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center mt-1">
                    <i class="fas fa-hdd text-xs mr-1"></i>
                    Total space
                </p>
            </div>
            <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                <i class="fas fa-hdd text-purple-600 dark:text-purple-400 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity Section -->
<div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
    <!-- Latest Music -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-music text-blue-600 dark:text-blue-400"></i>
                </div>
                Latest Music
            </h3>
            <a href="{{ route('admin.allmusic') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 font-medium">
                View all
                <i class="fas fa-arrow-right ml-1 text-xs"></i>
            </a>
        </div>

        <div class="p-6">
            <div class="space-y-4">
                @forelse($latestMusic as $music)
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                        <div class="flex-shrink-0">
                            @if($music->cover_image)
                                <img src="{{ asset('storage/' . $music->cover_image) }}" class="w-16 h-16 rounded-lg object-cover shadow-sm">
                            @else
                                <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center shadow-sm">
                                    <i class="fas fa-music text-white text-lg"></i>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-semibold text-gray-900 dark:text-white truncate">{{ $music->title }}</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400 truncate">{{ $music->artist }}</p>
                            <div class="flex items-center space-x-4 mt-2">
                                @if($music->album)
                                    <span class="text-xs text-gray-500 dark:text-gray-400"><i class="fas fa-compact-disc mr-1"></i>{{ $music->album }}</span>
                                @endif
                                @if($music->year)
                                    <span class="text-xs text-gray-500 dark:text-gray-400"><i class="fas fa-calendar mr-1"></i>{{ $music->year }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 dark:text-gray-400">No music uploaded yet.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Latest Videos -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                <div class="w-8 h-8 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-video text-red-600 dark:text-red-400"></i>
                </div>
                Latest Videos
            </h3>
            <a href="{{ route('video.index') }}" class="text-sm text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 font-medium">
                View all
                <i class="fas fa-arrow-right ml-1 text-xs"></i>
            </a>
        </div>

        <div class="p-6">
            <div class="space-y-4">
                @forelse($latestVideos as $video)
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                        <div class="flex-shrink-0">
                            @if($video->thumbnail)
                                <img src="{{ asset('storage/' . $video->thumbnail) }}" class="w-16 h-16 rounded-lg object-cover shadow-sm">
                            @else
                                <div class="w-16 h-16 bg-gradient-to-br from-red-400 to-red-600 rounded-lg flex items-center justify-center shadow-sm">
                                    <i class="fas fa-video text-white text-lg"></i>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-semibold text-gray-900 dark:text-white truncate">{{ $video->title }}</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400 truncate">{{ $video->artist }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 dark:text-gray-400">No videos uploaded yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="mt-8">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Quick Actions</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.music') }}" class="flex flex-col items-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors duration-200 group">
                <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-200">
                    <i class="fas fa-plus text-white"></i>
                </div>
                <span class="text-sm font-medium text-blue-900 dark:text-blue-100">Add Music</span>
            </a>
            <a href="{{ route('admin.video') }}" class="flex flex-col items-center p-4 bg-red-50 dark:bg-red-900/20 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors duration-200 group">
                <div class="w-12 h-12 bg-red-600 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-200">
                    <i class="fas fa-video text-white"></i>
                </div>
                <span class="text-sm font-medium text-red-900 dark:text-red-100">Add Video</span>
            </a>
            <a href="{{ route('admin.category') }}" class="flex flex-col items-center p-4 bg-green-50 dark:bg-green-900/20 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors duration-200 group">
                <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-200">
                    <i class="fas fa-layer-group text-white"></i>
                </div>
                <span class="text-sm font-medium text-green-900 dark:text-green-100">Add Category</span>
            </a>
            <a href="{{ route('admin.allusers') }}" class="flex flex-col items-center p-4 bg-purple-50 dark:bg-purple-900/20 rounded-lg hover:bg-purple-100 dark:hover:bg-purple-900/30 transition-colors duration-200 group">
                <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-200">
                    <i class="fas fa-users text-white"></i>
                </div>
                <span class="text-sm font-medium text-purple-900 dark:text-purple-100">Manage Users</span>
            </a>
        </div>
    </div>
</div>
@endsection
