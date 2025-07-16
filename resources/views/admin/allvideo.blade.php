@extends('admin.adminmain')

@section('title', 'All Videos')

@section('content')
<!-- Page Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Video Library</h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Manage all your video content</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="{{ route('admin.video') }}" 
           class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg shadow-sm transition-colors duration-200">
            <i class="fas fa-plus mr-2"></i>
            Add New Video
        </a>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                <i class="fas fa-video text-red-600 dark:text-red-400 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Videos</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $videos->count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                <i class="fas fa-user-music text-blue-600 dark:text-blue-400 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Artists</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $videos->pluck('artist')->unique()->count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                <i class="fas fa-compact-disc text-green-600 dark:text-green-400 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Albums</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $videos->whereNotNull('album')->pluck('album')->unique()->count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                <i class="fas fa-tags text-purple-600 dark:text-purple-400 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Categories</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $videos->whereNotNull('category')->pluck('category')->unique()->count() }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Filters and Search -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 mb-8">
    <div class="p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
            <!-- Search -->
            <div class="relative flex-1 max-w-md">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" 
                       placeholder="Search videos..." 
                       class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
            </div>

            <!-- Filter Buttons -->
            <div class="flex items-center space-x-3">
                <select class="px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option>All Categories</option>
                    @foreach($videos->whereNotNull('category')->pluck('category')->unique() as $category)
                        <option>{{ $category }}</option>
                    @endforeach
                </select>

                <button class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                    <i class="fas fa-filter"></i>
                </button>

                <button class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                    <i class="fas fa-sort"></i>
                </button>

                <button class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                    <i class="fas fa-th-large"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Videos Table -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
    @if($videos->isEmpty())
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-video text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No videos found</h3>
            <p class="text-gray-500 dark:text-gray-400 mb-8">Get started by uploading your first video.</p>
            <a href="{{ route('admin.video') }}" 
               class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i>
                Add Your First Video
            </a>
        </div>
    @else
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Video Collection ({{ $videos->count() }})</h3>
                <a href="{{ route('video.index') }}" class="text-sm text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 font-medium">
                    View all
                    <i class="fas fa-arrow-right ml-1 text-xs"></i>
                </a>
            </div>
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
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Album
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Year
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($videos as $video)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                        <!-- Video Info -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-16 h-12 relative">
                                    @if($video->thumbnail)
                                        <img src="{{ asset('storage/' . $video->thumbnail) }}" 
                                             alt="Thumbnail" 
                                             class="w-16 h-12 rounded-lg object-cover shadow-sm">
                                        <!-- Play overlay -->
                                        <div class="absolute inset-0 bg-black bg-opacity-30 rounded-lg flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-200">
                                            <i class="fas fa-play text-white text-sm"></i>
                                        </div>
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
                                    @if($video->description)
                                        <div class="text-sm text-gray-500 dark:text-gray-400 truncate max-w-xs">
                                            {{ Str::limit($video->description, 50) }}
                                        </div>
                                    @endif
                                    <!-- Duration badge (if available) -->
                                    <div class="mt-1">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300">
                                            <i class="fas fa-clock mr-1 text-xs"></i>
                                            --:--
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Artist -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">{{ $video->artist }}</div>
                        </td>

                        <!-- Album -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">
                                {{ $video->album ?? '—' }}
                            </div>
                        </td>

                        <!-- Year -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">
                                {{ $video->year ?? '—' }}
                            </div>
                        </td>

                        <!-- Category -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($video->category)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300">
                                    {{ $video->category }}
                                </span>
                            @else
                                <span class="text-sm text-gray-400">—</span>
                            @endif
                        </td>

                        <!-- Actions -->
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2">
                                <!-- Play Button -->
                                <button class="p-2 text-gray-400 hover:text-red-600 dark:hover:text-red-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200" 
                                        title="Play Video">
                                    <i class="fas fa-play"></i>
                                </button>

                                <!-- Preview Button -->
                                <button class="p-2 text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200" 
                                        title="Preview">
                                    <i class="fas fa-eye"></i>
                                </button>

                                <!-- Edit Button -->
                                <a href="{{ route('video.edit', $video->id) }}" 
                                   class="p-2 text-gray-400 hover:text-yellow-600 dark:hover:text-yellow-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('video.delete', $video->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this video?')"
                                            class="p-2 text-gray-400 hover:text-red-600 dark:hover:text-red-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200"
                                            title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>

                                <!-- More Options -->
                                <div class="relative" x-data="{ open: false }">
                                    <button @click="open = !open" 
                                            class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    
                                    <div x-show="open" 
                                         @click.away="open = false"
                                         x-transition:enter="transition ease-out duration-100"
                                         x-transition:enter-start="transform opacity-0 scale-95"
                                         x-transition:enter-end="transform opacity-100 scale-100"
                                         x-transition:leave="transition ease-in duration-75"
                                         x-transition:leave-start="transform opacity-100 scale-100"
                                         x-transition:leave-end="transform opacity-0 scale-95"
                                         class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 rounded-lg shadow-lg border border-gray-200 dark:border-gray-600 z-10"
                                         style="display: none;">
                                        <div class="py-1">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <i class="fas fa-download mr-2"></i>Download
                                            </a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <i class="fas fa-share mr-2"></i>Share
                                            </a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <i class="fas fa-copy mr-2"></i>Duplicate
                                            </a>
                                            <div class="border-t border-gray-100 dark:border-gray-600"></div>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <i class="fas fa-cog mr-2"></i>Settings
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    Showing {{ $videos->count() }} of {{ $videos->count() }} videos
                </div>
                <div class="flex items-center space-x-2">
                    <button class="px-3 py-1 text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 disabled:opacity-50" disabled>
                        Previous
                    </button>
                    <button class="px-3 py-1 text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 disabled:opacity-50" disabled>
                        Next
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Grid View Toggle (Optional) -->
<div class="fixed bottom-6 right-6">
    <button class="w-12 h-12 bg-red-600 hover:bg-red-700 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-200 flex items-center justify-center" 
            title="Toggle Grid View">
        <i class="fas fa-th"></i>
    </button>
</div>
@endsection
