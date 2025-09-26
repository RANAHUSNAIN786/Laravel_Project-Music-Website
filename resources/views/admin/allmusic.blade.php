@extends('admin.adminmain')

@section('title', 'All Music')

@section('content')
<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div x-data="{ view: 'list' }">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Music Library</h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Manage all your music tracks</p>
        </div>
        <div class="mt-4 sm:mt-0 flex space-x-4">
            <a href="{{ route('admin.music') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i>
                Add New Music
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

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                    <i class="fas fa-music text-blue-600 dark:text-blue-400 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Tracks</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $music->count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user text-green-600 dark:text-green-400 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Artists</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $music->pluck('artist')->unique()->count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                    <i class="fas fa-compact-disc text-purple-600 dark:text-purple-400 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Albums</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $music->whereNotNull('album')->pluck('album')->unique()->count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center">
                    <i class="fas fa-tags text-orange-600 dark:text-orange-400 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Genres</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $music->whereNotNull('genre')->pluck('genre')->unique()->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Container -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border">
        @if($music->isEmpty())
            <div class="text-center py-16">
                <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-music text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No music tracks found</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-8">Get started by uploading your first music track.</p>
                <a href="{{ route('admin.music') }}" 
                   class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200">
                    <i class="fas fa-plus mr-2"></i>
                    Add Your First Track
                </a>
            </div>
        @else

            <!-- LIST VIEW -->
            <div x-show="view === 'list'" class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700/50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Track</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Artist</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Album</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Year</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Genre</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($music as $track)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if($track->cover_image)
                                        <img src="{{ asset('storage/' . $track->cover_image) }}" class="w-12 h-12 rounded-lg object-cover">
                                    @else
                                        <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center text-white">
                                            <i class="fas fa-music"></i>
                                        </div>
                                    @endif
                                    <div class="ml-3">
                                        <p class="font-medium">{{ $track->title }}</p>
                                        <p class="text-xs text-gray-500">{{ Str::limit($track->description, 40) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">{{ $track->artist }}</td>
                            <td class="px-6 py-4">{{ $track->album ?? '—' }}</td>
                            <td class="px-6 py-4">{{ $track->year ?? '—' }}</td>
                            <td class="px-6 py-4">{{ $track->genre ?? '—' }}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('music.edit', $track->id) }}" class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('music.delete', $track->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Delete this track?')" class="text-red-600 hover:text-red-800">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- GRID VIEW -->
            <div x-show="view === 'grid'" class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($music as $track)
                    <div class="bg-white dark:bg-gray-800 border rounded-xl shadow-sm overflow-hidden group">
                        <div class="relative">
                            @if($track->cover_image)
                                <img src="{{ asset('storage/' . $track->cover_image) }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-blue-500 flex items-center justify-center text-white">
                                    <i class="fas fa-music text-2xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h4 class="font-medium truncate">{{ $track->title }}</h4>
                            <p class="text-sm text-gray-500">{{ $track->artist }}</p>
                        </div>
                        <div class="p-4 border-t flex justify-end space-x-3">
                            <a href="{{ route('music.edit', $track->id) }}" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('music.delete', $track->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete this track?')" class="text-red-600 hover:text-red-800">
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
