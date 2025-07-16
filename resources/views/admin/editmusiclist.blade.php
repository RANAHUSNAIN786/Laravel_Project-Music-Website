@extends('admin.adminmain')

@section('title', 'Edit Music List')

@section('content')
<!-- Page Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
            <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mr-3">
                <i class="fas fa-edit text-blue-600 dark:text-blue-400"></i>
            </div>
            Edit Music List
        </h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Select music tracks to edit</p>
    </div>
    <div class="mt-4 sm:mt-0 flex items-center space-x-3">
        <a href="{{ route('admin.allmusic') }}" 
           class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Music
        </a>
        <a href="{{ route('admin.music') }}" 
           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
            <i class="fas fa-plus mr-2"></i>
            Add New Music
        </a>
    </div>
</div>

<!-- Stats Card -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-8">
    <div class="flex items-center">
        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
            <i class="fas fa-music text-blue-600 dark:text-blue-400 text-xl"></i>
        </div>
        <div class="ml-4">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Music Tracks</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $music->count() }}</p>
        </div>
    </div>
</div>

<!-- Search and Filter -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 mb-8">
    <div class="p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
            <!-- Search -->
            <div class="relative flex-1 max-w-md">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" 
                       id="searchInput"
                       placeholder="Search music tracks..." 
                       class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Filter Options -->
            <div class="flex items-center space-x-3">
                <select id="sortSelect" class="px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="title">Sort by Title</option>
                    <option value="artist">Sort by Artist</option>
                    <option value="album">Sort by Album</option>
                    <option value="year">Sort by Year</option>
                </select>

                <button class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                    <i class="fas fa-filter"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Music Table -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
    @if($music->isEmpty())
        <!-- Empty State -->
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
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Music Tracks ({{ $music->count() }})</h3>
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    Click on any track to edit
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="musicTable">
                <thead class="bg-gray-50 dark:bg-gray-700/50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Track
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Artist
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Album
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Genre
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($music as $track)
                    <tr class="hover:bg-blue-50 dark:hover:bg-blue-900/10 transition-colors duration-200 music-row" 
                        data-title="{{ strtolower($track->title) }}" 
                        data-artist="{{ strtolower($track->artist) }}"
                        data-album="{{ strtolower($track->album ?? '') }}"
                        data-genre="{{ strtolower($track->genre ?? '') }}">
                        <!-- Track Info -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-12 h-12">
                                    @if($track->cover_image)
                                        <img src="{{ asset('storage/' . $track->cover_image) }}" 
                                             alt="Cover" 
                                             class="w-12 h-12 rounded-lg object-cover shadow-sm">
                                    @else
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center shadow-sm">
                                            <i class="fas fa-music text-white"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $track->title }}
                                    </div>
                                    @if($track->year)
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ $track->year }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </td>

                        <!-- Artist -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">{{ $track->artist }}</div>
                        </td>

                        <!-- Album -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">
                                {{ $track->album ?? '—' }}
                            </div>
                        </td>

                        <!-- Genre -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($track->genre)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300">
                                    {{ $track->genre }}
                                </span>
                            @else
                                <span class="text-sm text-gray-400">—</span>
                            @endif
                        </td>

                        <!-- Actions -->
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2">
                                <!-- Quick Preview -->
                                <button class="p-2 text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200" 
                                        title="Quick Preview">
                                    <i class="fas fa-eye"></i>
                                </button>

                                <!-- Edit Button -->
                                <a href="{{ route('music.edit', $track->id) }}" 
                                   class="inline-flex items-center px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200"
                                   title="Edit Track">
                                    <i class="fas fa-edit mr-2"></i>
                                    Edit
                                </a>

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
                                            <a href="{{ route('music.edit', $track->id) }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <i class="fas fa-edit mr-2"></i>Edit Details
                                            </a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <i class="fas fa-copy mr-2"></i>Duplicate
                                            </a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <i class="fas fa-download mr-2"></i>Download
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
                    Showing <span id="visibleCount">{{ $music->count() }}</span> of {{ $music->count() }} tracks
                </div>
                <div class="text-sm text-blue-600 dark:text-blue-400">
                    <i class="fas fa-info-circle mr-1"></i>
                    Click "Edit" to modify track details
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Quick Actions Panel -->
<div class="mt-8 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Quick Actions</h3>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <a href="{{ route('admin.music') }}" 
           class="flex items-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors duration-200">
            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                <i class="fas fa-plus text-white"></i>
            </div>
            <div>
                <p class="font-medium text-blue-900 dark:text-blue-100">Add New Music</p>
                <p class="text-sm text-blue-700 dark:text-blue-300">Upload a new track</p>
            </div>
        </a>

        <a href="{{ route('admin.allmusic') }}" 
           class="flex items-center p-4 bg-green-50 dark:bg-green-900/20 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors duration-200">
            <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center mr-3">
                <i class="fas fa-list text-white"></i>
            </div>
            <div>
                <p class="font-medium text-green-900 dark:text-green-100">View All Music</p>
                <p class="text-sm text-green-700 dark:text-green-300">Browse music library</p>
            </div>
        </a>

        <a href="{{ route('music.deleteview') }}" 
           class="flex items-center p-4 bg-red-50 dark:bg-red-900/20 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors duration-200">
            <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center mr-3">
                <i class="fas fa-trash text-white"></i>
            </div>
            <div>
                <p class="font-medium text-red-900 dark:text-red-100">Delete Music</p>
                <p class="text-sm text-red-700 dark:text-red-300">Remove tracks</p>
            </div>
        </a>
    </div>
</div>

<script>
// Search functionality
document.getElementById('searchInput').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('.music-row');
    let visibleCount = 0;

    rows.forEach(row => {
        const title = row.dataset.title;
        const artist = row.dataset.artist;
        const album = row.dataset.album;
        const genre = row.dataset.genre;

        if (title.includes(searchTerm) || 
            artist.includes(searchTerm) || 
            album.includes(searchTerm) || 
            genre.includes(searchTerm)) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });

    document.getElementById('visibleCount').textContent = visibleCount;
});

// Sort functionality
document.getElementById('sortSelect').addEventListener('change', function() {
    const sortBy = this.value;
    const tbody = document.querySelector('#musicTable tbody');
    const rows = Array.from(tbody.querySelectorAll('.music-row'));

    rows.sort((a, b) => {
        let aValue = a.dataset[sortBy] || '';
        let bValue = b.dataset[sortBy] || '';
        
        return aValue.localeCompare(bValue);
    });

    rows.forEach(row => tbody.appendChild(row));
});
</script>
@endsection
