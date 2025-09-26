@extends('admin.adminmain')

@section('title', 'All Videos')

@section('content')
<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div x-data="{ view: 'list' }">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Video Library</h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Manage all your video content</p>
        </div>
        <div class="mt-4 sm:mt-0 flex space-x-4">
            <a href="{{ route('admin.video') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i>
                Add New Video
            </a>
            <!-- Toggle -->
            <div class="flex items-center space-x-2">
                <button @click="view = 'list'"
                        :class="view === 'list' ? 'bg-green-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300'"
                        class="px-4 py-2 text-sm font-medium rounded-lg">
                    <i class="fas fa-list mr-2"></i> List
                </button>
                <button @click="view = 'grid'"
                        :class="view === 'grid' ? 'bg-green-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300'"
                        class="px-4 py-2 text-sm font-medium rounded-lg">
                    <i class="fas fa-th mr-2"></i> Grid
                </button>
            </div>
        </div>
    </div>

    <!-- Container -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
        @if($videos->isEmpty())
            <div class="text-center py-16">
                <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-video text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No videos found</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-8">Upload your first video to get started.</p>
                <a href="{{ route('admin.video') }}" 
                   class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200">
                    <i class="fas fa-plus mr-2"></i>
                    Add Your First Video
                </a>
            </div>
        @else

            <!-- ================= LIST VIEW ================= -->
            <div x-show="view === 'list'" class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700/50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Video</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Artist</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Album</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Year</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($videos as $video)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if($video->thumbnail)
                                        <img src="{{ asset('storage/' . $video->thumbnail) }}" class="w-16 h-12 rounded-lg object-cover">
                                    @else
                                        <div class="w-16 h-12 bg-red-500 rounded-lg flex items-center justify-center text-white">
                                            <i class="fas fa-video"></i>
                                        </div>
                                    @endif
                                    <div class="ml-3">
                                        <p class="font-medium">{{ $video->title }}</p>
                                        <p class="text-xs text-gray-500">{{ Str::limit($video->description, 40) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">{{ $video->artist }}</td>
                            <td class="px-6 py-4">{{ $video->album ?? '—' }}</td>
                            <td class="px-6 py-4">{{ $video->year ?? '—' }}</td>
                            <td class="px-6 py-4">{{ $video->category ?? '—' }}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('video.edit', $video->id) }}" class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('video.delete', $video->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Delete this video?')" class="text-red-600 hover:text-red-800">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                               
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- ================= GRID VIEW ================= -->
            <div x-show="view === 'grid'" class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($videos as $video)
                    <div class="bg-white dark:bg-gray-800 border rounded-xl shadow-sm overflow-hidden group">
                        <div class="relative">
                            @if($video->thumbnail)
                                <img src="{{ asset('storage/' . $video->thumbnail) }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-red-500 flex items-center justify-center text-white">
                                    <i class="fas fa-video text-2xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h4 class="font-medium truncate">{{ $video->title }}</h4>
                            <p class="text-sm text-gray-500">{{ $video->artist }}</p>
                        </div>
                        <div class="p-4 border-t flex justify-end space-x-3">
                            <a href="{{ route('video.edit', $video->id) }}" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('video.delete', $video->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete this video?')" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        @endif
    </div>
</div>
@endsection
