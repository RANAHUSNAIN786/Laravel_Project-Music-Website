@extends('admin.adminmain')

@section('title', 'Add Music')

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
                <i class="fas fa-plus text-blue-600 dark:text-blue-400"></i>
            </div>
            Add New Music
        </h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Upload a new music track to your library</p>
    </div>
    <div class="mt-4 sm:mt-0 flex items-center space-x-3">
        <a href="{{ route('admin.allmusic') }}" 
           class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Music
        </a>
    </div>
</div>

<!-- Upload Form -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
            <i class="fas fa-music mr-2 text-blue-500"></i>
            Music Information
        </h3>
        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Fill in the details for your music track</p>
    </div>

    <form action="{{ route('music.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-6">
                <!-- Audio File Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-file-audio mr-2 text-blue-500"></i>
                        Music File (MP3) *
                    </label>
                    
                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center hover:border-blue-400 dark:hover:border-blue-500 transition-colors duration-200">
                        <input type="file" 
                               id="audio_file"
                               name="audio_file" 
                               accept=".mp3"
                               required
                               class="hidden"
                               onchange="handleFileSelect(this, 'audio-preview')">
                        <label for="audio_file" class="cursor-pointer">
                            <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-upload text-blue-600 dark:text-blue-400 text-2xl"></i>
                            </div>
                            <p class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                                Upload Music File
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Drag and drop your MP3 file here, or click to browse
                            </p>
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-2">
                                Supported format: MP3 • Max size: 50MB
                            </p>
                        </label>
                        <div id="audio-preview" class="mt-4 hidden">
                            <div class="flex items-center justify-center p-3 bg-green-50 dark:bg-green-900/20 rounded-lg">
                                <i class="fas fa-music text-green-600 dark:text-green-400 mr-2"></i>
                                <p class="text-sm text-green-700 dark:text-green-300 font-medium"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-music mr-2 text-blue-500"></i>
                        Title *
                    </label>
                    <input type="text" 
                           id="title"
                           name="title" 
                           value="{{ old('title') }}" 
                           placeholder="Enter song title"
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
                           value="{{ old('artist') }}" 
                           placeholder="Enter artist name"
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
                           value="{{ old('album') }}" 
                           placeholder="Enter album name (optional)"
                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200">
                </div>

                <!-- Year and Genre Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Year -->
                    <div>
                        <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-calendar mr-2 text-blue-500"></i>
                            Year
                        </label>
                        <input type="number" 
                               id="year"
                               name="year" 
                               value="{{ old('year') }}" 
                               min="1900" 
                               max="{{ date('Y') + 1 }}"
                               placeholder="{{ date('Y') }}"
                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200">
                    </div>

                    <!-- Genre -->
                    <div>
                        <label for="genre" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-tags mr-2 text-blue-500"></i>
                            Genre
                        </label>
                        <input type="text" 
                               id="genre"
                               name="genre" 
                               value="{{ old('genre') }}" 
                               placeholder="e.g., Pop, Rock, Jazz"
                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200">
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Cover Image Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-image mr-2 text-blue-500"></i>
                        Cover Image
                    </label>
                    
                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center hover:border-blue-400 dark:hover:border-blue-500 transition-colors duration-200">
                        <input type="file" 
                               id="cover_image"
                               name="cover_image" 
                               accept="image/*"
                               class="hidden"
                               onchange="handleImageSelect(this, 'image-preview')">
                        <label for="cover_image" class="cursor-pointer">
                            <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-camera text-blue-600 dark:text-blue-400 text-2xl"></i>
                            </div>
                            <p class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                                Upload Cover Image
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Add an album cover or artwork
                            </p>
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-2">
                                PNG, JPG, GIF up to 10MB
                            </p>
                        </label>
                        <div id="image-preview" class="mt-4 hidden">
                            <img class="w-32 h-32 object-cover rounded-lg mx-auto shadow-sm border border-gray-200 dark:border-gray-600">
                            <p class="text-sm text-green-600 dark:text-green-400 mt-2 font-medium">Image selected</p>
                        </div>
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
                              rows="6"
                              placeholder="Enter a description for this music track..."
                              class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200 resize-vertical">{{ old('description') }}</textarea>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Optional: Add details about the song, lyrics, or any other information
                    </p>
                </div>

                <!-- Upload Progress (Hidden by default) -->
                <div id="upload-progress" class="hidden">
                    <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-upload text-blue-600 dark:text-blue-400 mr-2"></i>
                            <span class="text-sm font-medium text-blue-800 dark:text-blue-200">Uploading...</span>
                        </div>
                        <div class="w-full bg-blue-200 dark:bg-blue-800 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full transition-all duration-300" style="width: 0%" id="progress-bar"></div>
                        </div>
                        <p class="text-xs text-blue-600 dark:text-blue-400 mt-1" id="progress-text">0%</p>
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
                        id="submit-btn"
                        class="inline-flex items-center px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
                    <i class="fas fa-upload mr-2"></i>
                    <span id="submit-text">Upload Music</span>
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Quick Tips -->
<div class="mt-8 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
    <h3 class="text-lg font-semibold text-blue-900 dark:text-blue-100 mb-4 flex items-center">
        <i class="fas fa-lightbulb mr-2"></i>
        Upload Tips
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-blue-800 dark:text-blue-200">
        <div class="flex items-start">
            <i class="fas fa-check-circle text-blue-600 dark:text-blue-400 mr-2 mt-0.5"></i>
            <span>Use high-quality MP3 files for best audio experience</span>
        </div>
        <div class="flex items-start">
            <i class="fas fa-check-circle text-blue-600 dark:text-blue-400 mr-2 mt-0.5"></i>
            <span>Add cover images in square format (1:1 ratio) for best results</span>
        </div>
        <div class="flex items-start">
            <i class="fas fa-check-circle text-blue-600 dark:text-blue-400 mr-2 mt-0.5"></i>
            <span>Fill in all metadata for better organization</span>
        </div>
        <div class="flex items-start">
            <i class="fas fa-check-circle text-blue-600 dark:text-blue-400 mr-2 mt-0.5"></i>
            <span>Use descriptive titles and artist names</span>
        </div>
    </div>
</div>

<script>
function handleFileSelect(input, previewId) {
    const preview = document.getElementById(previewId);
    const file = input.files[0];
    
    if (file) {
        preview.querySelector('p').textContent = `Selected: ${file.name}`;
        preview.classList.remove('hidden');
        
        // Auto-fill title if empty
        const titleInput = document.getElementById('title');
        if (!titleInput.value) {
            const fileName = file.name.replace(/\.[^/.]+$/, ""); // Remove extension
            titleInput.value = fileName;
        }
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

// Form validation and submission
document.querySelector('form').addEventListener('submit', function(e) {
    const audioFile = document.getElementById('audio_file').files[0];
    const title = document.getElementById('title').value.trim();
    const artist = document.getElementById('artist').value.trim();
    
    if (!audioFile) {
        e.preventDefault();
        alert('Please select a music file to upload.');
        return false;
    }
    
    if (!title || !artist) {
        e.preventDefault();
        alert('Please fill in all required fields (Title and Artist).');
        return false;
    }
    
    // Show upload progress
    const submitBtn = document.getElementById('submit-btn');
    const submitText = document.getElementById('submit-text');
    const progressDiv = document.getElementById('upload-progress');
    
    submitBtn.disabled = true;
    submitText.textContent = 'Uploading...';
    progressDiv.classList.remove('hidden');
    
    // Simulate progress (you can replace this with actual upload progress)
    let progress = 0;
    const progressBar = document.getElementById('progress-bar');
    const progressText = document.getElementById('progress-text');
    
    const interval = setInterval(() => {
        progress += Math.random() * 15;
        if (progress > 90) progress = 90;
        
        progressBar.style.width = progress + '%';
        progressText.textContent = Math.round(progress) + '%';
        
        if (progress >= 90) {
            clearInterval(interval);
        }
    }, 200);
});

// Drag and drop functionality
const dropZones = document.querySelectorAll('[class*="border-dashed"]');

dropZones.forEach(zone => {
    zone.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('border-blue-400', 'bg-blue-50', 'dark:bg-blue-900/10');
    });
    
    zone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('border-blue-400', 'bg-blue-50', 'dark:bg-blue-900/10');
    });
    
    zone.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('border-blue-400', 'bg-blue-50', 'dark:bg-blue-900/10');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            const input = this.querySelector('input[type="file"]');
            input.files = files;
            
            // Trigger change event
            const event = new Event('change', { bubbles: true });
            input.dispatchEvent(event);
        }
    });
});
</script>
@endsection
