@extends('admin.adminmain')

@section('title', 'Delete Videos')

@section('content')
<!-- Flash Messages -->
@if(session('success'))
    <div class="mb-6 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-4">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <i class="fas fa-check-circle text-green-400"></i>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800 dark:text-green-200">
                    <strong>Success:</strong> {{ session('success') }}
                </p>
            </div>
            <div class="ml-auto pl-3">
                <button onclick="this.parentElement.parentElement.parentElement.remove()" class="text-green-400 hover:text-green-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>
@endif

<!-- Page Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
            <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center mr-3">
                <i class="fas fa-trash-alt text-red-600 dark:text-red-400"></i>
            </div>
            Delete Videos
        </h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Remove video files from your library</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="{{ route('video.index') }}" 
           class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Videos
        </a>
    </div>
</div>

<!-- Warning Notice -->
<div class="mb-8 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4">
    <div class="flex items-start">
        <div class="flex-shrink-0">
            <i class="fas fa-exclamation-triangle text-red-400"></i>
        </div>
        <div class="ml-3">
            <h3 class="text-sm font-medium text-red-800 dark:text-red-200">
                Warning: This action cannot be undone
            </h3>
            <p class="text-sm text-red-700 dark:text-red-300 mt-1">
                Deleted videos will be permanently removed from the system.
            </p>
        </div>
    </div>
</div>

<!-- Videos Table -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
    @if(empty($videos))
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-video text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No videos found</h3>
            <p class="text-gray-500 dark:text-gray-400 mb-8">There are no videos available for deletion.</p>
            <a href="{{ route('admin.video') }}" 
               class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i>
                Add Video
            </a>
        </div>
    @else
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Videos ({{ count($videos) }})</h3>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700/50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Video
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Artist
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($videos as $video)
                    <tr class="hover:bg-red-50 dark:hover:bg-red-900/10 transition-colors duration-200">
                        <!-- Video Info -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-16 h-12 relative">
                                    @if($video->thumbnail)
                                        <img src="{{ asset('storage/' . $video->thumbnail) }}" 
                                             alt="Thumbnail" 
                                             class="w-16 h-12 rounded-lg object-cover shadow-sm">
                                    @else
                                        <div class="w-16 h-12 bg-gradient-to-br from-red-400 to-red-600 rounded-lg flex items-center justify-center shadow-sm">
                                            <i class="fas fa-video text-white"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $video->title }}
                                    </div>
                                    @if($video->album)
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ $video->album }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </td>

                        <!-- Artist -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">{{ $video->artist }}</div>
                        </td>

                        <!-- Actions -->
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <form action="{{ route('video.delete', $video->id) }}" method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete {{ addslashes($video->title) }}? This action cannot be undone.')" 
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-3 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                                    <i class="fas fa-trash mr-2"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
            <div class="text-sm text-gray-500 dark:text-gray-400">
                Showing {{ count($videos) }} videos
            </div>
        </div>
    @endif
</div>
@endsection
