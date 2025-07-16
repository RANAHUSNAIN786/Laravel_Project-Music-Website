@extends('admin.adminmain')

@section('title', 'Edit Music')

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
                    {{ session('success') }}
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

@if($errors->any())
    <div class="mb-6 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <i class="fas fa-exclamation-circle text-red-400"></i>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800 dark:text-red-200">Please fix the following errors:</h3>
                <ul class="mt-2 text-sm text-red-700 dark:text-red-300 list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

<!-- Page Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
            <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mr-3">
                <i class="fas fa-edit text-blue-600 dark:text-blue-400"></i>
            </div>
            Edit Music
        </h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Update music track information</p>
    </div>
    <div class="mt-4 sm:mt-0 flex items-center space-x-3">
        <a href="{{ route('admin.allmusic') }}" 
           class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Music
        </a>
    </div>
</div>

<!-- Current Track Info -->
<div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4 mb-8">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            @if($music->cover_image)
                <img src="{{ asset('storage/' . $music->cover_image) }}" 
                     alt="Current Cover" 
                     class="w-16 h-16 rounded-lg object-cover shadow-sm">
            @else
                <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center shadow-sm">
                    <i class="fas fa-music text-white text-xl"></i>
                </div>
            @endif
        </div>
        <div class="ml-4">
            <h3 class="text-lg font-semibold text-blue-900 dark:text-blue-100">{{ $music->title }}</h3>
            <p class="text-blue-700 dark:text-blue-300">by {{ $music->artist }}</p>
            @if($music->album)
                <p class="text-sm text-blue-600 dark:text-blue-400">Album: {{ $music->album }}</p>
            @endif
        </div>
    </div>
</div>

<!-- Edit Form -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Music Information</h3>
    </div>

    <form action="{{ route('music.update', $music->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-music mr-2 text-blue-500"></i>
                        Title *
                    </label>
                    <input type="text" 
                           id="title"
                           name="title" 
                           value="{{ old('title', $music->title) }}" 
                           required
                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200">
                </div>

                <!-- Artist -->
                <div>
                    <label for="artist" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-user-music mr-2 text-blue-500"></i>
                        Artist *
                    </label>
                    <input type="text" 
                           id="artist"
                           name="artist" 
                           value="{{ old('artist', $music->artist) }}" 
                           required
                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200">
                </div>

                <!-- Album -->
                <div>
                    <label for="album" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-compact-disc mr-2 text-blue-500"></i>
                        Album
                    </label>
                    <input type="text" 
                           id="album"
                           name="album" 
                           value="{{ old('album', $music->album) }}" 
                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200">
                </div>

                <!-- Genre and Year Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Genre -->
                    <div>
                        <label for="genre" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-tags mr-2 text-blue-500"></i>
                            Genre
                        </label>
                        <input type="text" 
                               id="genre"
                               name="genre" 
                               value="{{ old('genre', $music->genre) }}" 
                               placeholder="e.g., Pop, Rock, Jazz"
                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200">
                    </div>

                    <!-- Year -->
                    <div>
                        <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-calendar mr-2 text-blue-500"></i>
                            Year
                        </label>
                        <input type="number" 
                               id="year"
                               name="year" 
                               value="{{ old('year', $music->year) }}" 
                               min="1900" 
                               max="{{ date('Y') + 1 }}"
                               placeholder="{{ date('Y') }}"
                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200">
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-align-left mr-2 text-blue-500"></i>
                        Description
                    </label>
                    <textarea id="description"
                              name="description" 
                              rows="4"
                              placeholder="Enter a description for this music track..."
                              class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200 resize-vertical">{{ old('description', $music->description) }}</textarea>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Audio File Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-file-audio mr-2 text-blue-500"></i>
                        Audio File (MP3)
                    </label>
                    
                    <!-- Current File Info -->
                    @if($music->audio_file)
                        <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg border border-gray-200 dark:border-gray-600">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-file-audio text-blue-600 dark:text-blue-400"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">Current Audio File</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ basename($music->audio_file) }}</p>
                                    </div>
                                </div>
                                <button type="button" class="text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300">
                                    <i class="fas fa-play"></i>
                                </button>
                            </div>
                        </div>
                    @endif

                    <!-- File Upload -->
                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center hover:border-blue-400 dark:hover:border-blue-500 transition-colors duration-200">
                        <input type="file" 
                               id="audio_file"
                               name="audio_file" 
                               accept=".mp3"
                               class="hidden"
                               onchange="handleFileSelect(this, 'audio-preview')">
                        <label for="audio_file" class="cursor-pointer">
                            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-upload text-blue-600 dark:text-blue-400 text-xl"></i>
                            </div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white mb-1">
                                {{ $music->audio_file ? 'Replace Audio File' : 'Upload Audio File' }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">MP3 files only</p>
                        </label>
                        <div id="audio-preview" class="mt-3 hidden">
                            <p class="text-sm text-green-600 dark:text-green-400"></p>
                        </div>
                    </div>
                </div>

                <!-- Cover Image Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-image mr-2 text-blue-500"></i>
                        Cover Image
                    </label>
                    
                    <!-- Current Image Preview -->
                    @if($music->cover_image)
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Current Cover Image:</p>
                            <img src="{{ asset('storage/' . $music->cover_image) }}" 
                                 alt="Current Cover" 
                                 class="w-32 h-32 object-cover rounded-lg shadow-sm border border-gray-200 dark:border-gray-600">
                        </div>
                    @endif

                    <!-- Image Upload -->
                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center hover:border-blue-400 dark:hover:border-blue-500 transition-colors duration-200">
                        <input type="file" 
                               id="cover_image"
                               name="cover_image" 
                               accept="image/*"
                               class="hidden"
                               onchange="handleImageSelect(this, 'image-preview')">
                        <label for="cover_image" class="cursor-pointer">
                            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-camera text-blue-600 dark:text-blue-400 text-xl"></i>
                            </div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white mb-1">
                                {{ $music->cover_image ? 'Replace Cover Image' : 'Upload Cover Image' }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF up to 10MB</p>
                        </label>
                        <div id="image-preview" class="mt-4 hidden">
                            <img class="w-24 h-24 object-cover rounded-lg mx-auto shadow-sm">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-between pt-8 border-t border-gray-200 dark:border-gray-700 mt-8">
            <div class="text-sm text-gray-500 dark:text-gray-400">
                <i class="fas fa-info-circle mr-1"></i>
                Fields marked with * are required
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.allmusic') }}" 
                   class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 rounded-lg font-medium transition-colors duration-200">
                    Cancel
                </a>
                <button type="submit" 
                        class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>
                    Update Music
                </button>
            </div>
        </div>
    </form>
</div>

<script>
function handleFileSelect(input, previewId) {
    const preview = document.getElementById(previewId);
    const file = input.files[0];
    
    if (file) {
        preview.querySelector('p').textContent = `Selected: ${file.name}`;
        preview.classList.remove('hidden');
    } else {
        preview.classList.add('hidden');
    }
}

function handleImageSelect(input, previewId) {
    const preview = document.getElementById(previewId);
    const file = input.files[0];
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.querySelector('img').src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    } else {
        preview.classList.add('hidden');
    }
}

// Form validation
document.querySelector('form').addEventListener('submit', function(e) {
    const title = document.getElementById('title').value.trim();
    const artist = document.getElementById('artist').value.trim();
    
    if (!title || !artist) {
        e.preventDefault();
        alert('Please fill in all required fields (Title and Artist).');
        return false;
    }
});
</script>
@endsection
