@extends('partials.user.main')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-32"> <!-- Increased top padding for header -->

    <!-- Main Video Detail -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden mb-16 flex flex-col lg:flex-row items-center lg:items-start gap-8 p-6">
        
        <!-- Video Player -->
        <div class="w-full lg:w-1/2 flex justify-center">
            @if($video->youtube_url)
                <iframe class="w-full h-64 md:h-96 rounded-xl shadow-md"
                    src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::after($video->youtube_url, 'v=') }}"
                    frameborder="0" allowfullscreen>
                </iframe>
            @else
                <video controls class="w-full rounded-xl shadow-md">
                    <source src="{{ asset('storage/' . $video->video_file) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @endif
        </div>

        <!-- Video Info -->
        <div class="w-full lg:w-1/2 flex flex-col justify-center space-y-4 text-center lg:text-left">
            <h1 class="text-4xl font-extrabold text-gray-900">{{ $video->title }}</h1>
            <p class="text-lg text-gray-600">
                Artist: <span class="font-semibold">{{ $video->artist ?? 'Unknown' }}</span>
            </p>
            <p class="text-gray-600">
                Album: <span class="font-semibold">{{ $video->album ?? '-' }}</span> • 
                Year: <span class="font-semibold">{{ $video->year ?? '-' }}</span>
            </p>
            <p class="text-gray-700">{{ $video->description }}</p>
        </div>
    </div>

    <!-- Related Videos -->
    <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Related Videos</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($related as $rel)
        <a href="{{ route('video.details', $rel->id) }}" 
           class="group bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden">
            <div class="relative h-48">
                <img src="{{ $rel->thumbnail ?? asset('images/default-thumbnail.jpg') }}" 
                     alt="{{ $rel->title }}" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-4 text-center lg:text-left">
                <h3 class="text-lg font-bold text-gray-900 group-hover:text-red-600">{{ $rel->title }}</h3>
                <p class="text-sm text-gray-600">{{ $rel->artist ?? 'Unknown Artist' }}</p>
                <span class="inline-block mt-2 px-2 py-1 text-xs font-semibold bg-red-100 text-red-600 rounded">Video</span>
            </div>
        </a>
        @endforeach
    </div>

</div>
@endsection
