@extends('admin.adminmain')

@section('title', 'Edit Video')

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
            <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center mr-3">
                <i class="fas fa-edit text-red-600 dark:text-red-400"></i>
            </div>
            Edit Video
        </h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Update video information and media</p>
    </div>
    <div class="mt-4 sm:mt-0 flex items-center space-x-3">
        <a href="{{ route('video.index') }}" 
           class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Videos
        </a>
    </div>
</div>

<!-- Current Video Info -->
<div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4 mb-8">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            @if($video->thumbnail)
                <img src="{{ asset('storage/' . $video->thumbnail) }}" 
                     alt="Current Thumbnail" 
                     class="w-20 h-16 rounded-lg object-cover shadow-sm">
            @else
                <div class="w-20 h-16 bg-gradient-to-br from-red-400 to-red-600 rounded-lg flex items-center justify-center shadow-sm">
                    <i class="fas fa-video text-white text-xl"></i>
                </div>
            @endif
        </div>
        <div class="ml-4">
            <h3 class="text-lg font-semibold text-red-900 dark:text-red-100">{{ $video->title }}</h3>
            <p class="text-red-700 dark:text-red-300">by {{ $video->artist }}</p>
            @if($video->album)
                <p class="text-sm text-red-600 dark:text-red-400">Album: {{ $video->album }}</p>
            @endif
            @if($video->category)
                <span class="inline-block mt-1 px-2 py-1 text-xs font-medium bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300 rounded-full">
                    {{ $video->category }}
                </span>
            @endif
        </div>
    </div>
</div>

<!-- Edit Form -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Video Information</h3>
    </div>

    <form action="{{ route('video.update', $video->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-video mr-2 text-red-500"></i>
                        Title *
                    </label>
                    <input type="text" 
                           id="title"
                           name="title" 
                           value="{{ old('title', $video->title) }}" 
                           required
                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors duration-200">
                </div>

                <!-- Artist -->
                <div>
                    <label for="artist" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-user-music mr-2 text-red-500"></i>
                        Artist *
                    </label>
                    <input type="text" 
                           id="artist"
                           name="artist" 
                           value="{{ old('artist', $video->artist) }}" 
                           required
                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors duration-200">
                </div>

                <!-- Album -->
                <div>
                    <label for="album" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-compact-disc mr-2 text-red-500"></i>
                        Album
                    </label>
                    <input type="text" 
                           id="album"
                           name="album" 
                           value="{{ old('album', $video->album) }}" 
                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors duration-200">
                </div>

                <!-- Year and Category Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Year -->
                    <div>
                        <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-calendar mr-2 text-red-500"></i>
                            Year
                        </label>
                        <input type="number" 
                               id="year"
                               name="year" 
                               value="{{ old('year', $video->year) }}" 
                               min="1900" 
                               max="{{ date('Y') + 1 }}"
                               placeholder="{{ date('Y') }}"
                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors duration-200">
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-tags mr-2 text-red-500"></i>
                            Category
                        </label>
                        <input type="text" 
                               id="category"
                               name="category" 
                               value="{{ old('category', $video->category) }}" 
                               placeholder="e.g., Music Video, Live"
                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors duration-200">
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-align-left mr-2 text-red-500"></i>
                        Description
                    </label>
                    <textarea id="description"
                              name="description" 
                              rows="4"
                              placeholder="Enter a description for this video..."
                              class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors duration-200 resize-vertical">{{ old('description', $video->description) }}</textarea>
                </div>

                <!-- YouTube URL -->
                <div>
                    <label for="youtube_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fab fa-youtube mr-2 text-red-500"></i>
                        YouTube URL
                    </label>
                    <input type="url" 
                           id="youtube_url"
                           name="youtube_url" 
                           value="{{ old('youtube_url', $video->youtube_url) }}" 
                           placeholder="https://www.youtube.com/watch?v=..."
                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors duration-200">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        <i class="fas fa-info-circle mr-1"></i>
                        Optional: Link to YouTube video
                    </p>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Video File Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-file-video mr-2 text-red-500"></i>
                        Video File (MP4)
                    </label>
                    
                    <!-- Current File Info -->
                    @if($video->video_file)
                        <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg border border-gray-200 dark:border-gray-600">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-file-video text-red-600 dark:text-red-400"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">Current Video File</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ basename($video->video_file) }}</p>
                                    </div>
                                </div>
                                <button type="button" class="text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300">
                                    <i class="fas fa-play"></i>
                                </button>
                            </div>
                        </div>
                    @endif

                    <!-- File Upload -->
                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center hover:border-red-400 dark:hover:border-red-500 transition-colors duration-200">
                        <input type="file" 
                               id="video_file"
                               name="video_file" 
                               accept=".mp4"
                               class="hidden"
                               onchange="handleFileSelect(this, 'video-preview')">
                        <label for="video_file" class="cursor-pointer">
                            <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-upload text-red-600 dark:text-red-400 text-xl"></i>
                            </div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white mb-1">
                                {{ $video->video_file ? 'Replace Video File' : 'Upload Video File' }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">MP4 files only</p>
                        </label>
                        <div id="video-preview" class="mt-3 hidden">
                            <p class="text-sm text-green-600 dark:text-green-400"></p>
                        </div>
                    </div>
                </div>

                <!-- Thumbnail Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-image mr-2 text-red-500"></i>
                        Thumbnail Image
                    </label>
                    
                    <!-- Current Thumbnail Preview -->
                    @if($video->thumbnail)
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Current Thumbnail:</p>
                            <img src="{{ asset('storage/' . $video->thumbnail) }}" 
                                 alt="Current Thumbnail" 
                                 class="w-40 h-32 object-cover rounded-lg shadow-sm border border-gray-200 dark:border-gray-600">
                        </div>
                    @endif

                    <!-- Image Upload -->
                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center hover:border-red-400 dark:hover:border-red-500 transition-colors duration-200">
                        <input type="file" 
                               id="thumbnail"
                               name="thumbnail" 
                               accept="image/*"
                               class="hidden"
                               onchange="handleImageSelect(this, 'thumbnail-preview')">
                        <label for="thumbnail" class="cursor-pointer">
                            <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-camera text-red-600 dark:text-red-400 text-xl"></i>
                            </div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white mb-1">
                                {{ $video->thumbnail ? 'Replace Thumbnail' : 'Upload Thumbnail' }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF up to 10MB</p>
                        </label>
                        <div id="thumbnail-preview" class="mt-4 hidden">
                            <img class="w-32 h-24 object-cover rounded-lg mx-auto shadow-sm">
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
                <a href="{{ route('video.index') }}" 
                   class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 rounded-lg font-medium transition-colors duration-200">
                    Cancel
                </a>
                <button type="submit" 
                        class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>
                    Update Video
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Preview Section (if files exist) -->
@if($video->video_file || $video->thumbnail || $video->youtube_url)
<div class="mt-8 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Current Media</h3>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @if($video->video_file)
                <div>
                    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Video Preview</h4>
                    <video controls class="w-full rounded-lg shadow-sm">
                        <source src="{{ asset('storage/' . $video->video_file) }}" type="video/mp4">
                        Your browser does not support the video element.
                    </video>
                </div>
            @endif
            
            @if($video->youtube_url)
                <div>
                    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">YouTube Video</h4>
                    <div class="aspect-video bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                        <a href="{{ $video->youtube_url }}" target="_blank" 
                           class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200">
                            <i class="fab fa-youtube mr-2"></i>
                            Watch on YouTube
                        </a>
                    </div>
                </div>
            @endif
            
            @if($video->thumbnail && !$video->video_file)
                <div>
                    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Thumbnail</h4>
                    <img src="{{ asset('storage/' . $video->thumbnail) }}" 
                         alt="Video Thumbnail" 
                         class="w-full max-w-xs rounded-lg shadow-sm">
                </div>
            @endif
        </div>
    </div>
</div>
@endif

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
