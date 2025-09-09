@extends('partials.user.main')

@section('content')

<!-- Hero Section -->
<div class="relative min-h-[50vh] flex items-center justify-center bg-gradient-to-br from-purple-800 via-indigo-900 to-blue-900 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=%2240%22 height=%2240%22 viewBox=%220 0 40 40%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23ffffff%22 fill-opacity=%220.05%22%3E%3Ccircle cx=%2220%22 cy=%2220%22 r=%221%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
    
    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-white mb-6 tracking-tight">
            <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                My Tracks
            </span>
        </h1>
        <p class="text-lg sm:text-xl text-white/80 max-w-2xl mx-auto leading-relaxed">
            Explore my latest music collection and immerse yourself in soulful melodies.
        </p>
    </div>
    
    <!-- Floating Music Notes Animation -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/4 text-white/10 text-4xl animate-bounce" style="animation-delay: 0s;">♪</div>
        <div class="absolute top-1/3 right-1/4 text-white/10 text-3xl animate-bounce" style="animation-delay: 1s;">♫</div>
        <div class="absolute bottom-1/4 left-1/3 text-white/10 text-5xl animate-bounce" style="animation-delay: 2s;">♪</div>
    </div>
</div>

<!-- Music Area -->


 <!-- Latest Music Section -->
 <div class="mt-20 bg-white py-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 sm:mb-16">
            <span class="inline-block px-4 py-2 bg-purple-100 text-purple-800 text-sm font-medium rounded-full mb-4">
                Music Collection
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Latest Music</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-purple-600 to-pink-600 mx-auto"></div>
        </div>
        
        <!-- Music Section Enhancement -->
        <div class="mb-12">
            <div class="bg-gradient-to-r from-purple-900 via-blue-900 to-indigo-900 rounded-3xl p-6 sm:p-8 text-white relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=%2260%22 height=%2260%22 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23ffffff%22 fill-opacity=%220.1%22%3E%3Ccircle cx=%2230%22 cy=%2230%22 r=%222%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
                
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 items-center">
                    <div>
                        <h3 class="text-2xl sm:text-3xl font-bold mb-4">🎵 Featured Playlist</h3>
                        <p class="text-white/80 mb-6 leading-relaxed text-base sm:text-lg">
                            Discover my latest musical journey through carefully crafted tracks that tell stories, evoke emotions, and create unforgettable moments. Each song is a piece of my soul shared with the world.
                        </p>
                        <div class="flex items-center space-x-4 sm:space-x-6 text-sm">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.369 4.369 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"/>
                                </svg>
                                {{ $music->count() }} Tracks
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                45 min total
                            </div>
                        </div>
                    </div>
                    <div class="text-center lg:text-right">
                        <div class="inline-flex items-center space-x-4 bg-white/10 backdrop-blur-sm rounded-2xl p-4 sm:p-6">
                            <div class="w-12 sm:w-16 h-12 sm:h-16 bg-white/20 rounded-full flex items-center justify-center">
                                <svg class="w-6 sm:w-8 h-6 sm:h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="text-white/80 text-sm">Now Playing</p>
                                <p class="font-semibold">{{ $music->first()->title ?? 'Select a Track' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       <div class="space-y-6">
    @forelse($music as $track)
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
            <div class="flex flex-col md:flex-row items-center p-4 sm:p-6 gap-4 sm:gap-6">
                <!-- Album Cover -->
                <div class="flex-shrink-0">
                    <div class="relative group">
                        <img src="{{ asset('storage/' . $track->cover_image) }}" alt="Cover Image"
                             class="w-20 sm:w-24 md:w-28 lg:w-32 h-20 sm:h-24 md:h-28 lg:h-32 object-cover rounded-xl shadow-md group-hover:shadow-lg transition-shadow duration-300">
                        <div class="absolute inset-0 bg-black/25 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <svg class="w-6 sm:w-8 h-6 sm:h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8 5v10l8-5-8-5z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Track Info -->
                <div class="flex-grow text-center md:text-left">
                    <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-900 mb-1">{{ $track->title }}</h3>
                    <p class="text-gray-600 mb-3 flex items-center justify-center md:justify-start text-xs sm:text-sm">
                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        {{ \Carbon\Carbon::parse($track->release_date)->format('d F, Y') }}
                    </p>
                    
                   <!-- Audio Player -->
                    <div class="w-full">
                        <audio controls class="w-full h-10 rounded-md shadow-sm">
                            <source src="{{ asset('storage/' . $track->audio_file) }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col gap-2 mt-4 md:mt-0">
                    <button class="px-3 py-1.5 bg-gradient-to-r from-purple-600 to-pink-600 text-white text-sm font-medium rounded-lg hover:from-purple-700 hover:to-pink-700 transition-all duration-300 shadow-md hover:shadow-lg">
                        Download
                    </button>
                    <button class="px-3 py-1.5 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition-all duration-300">
                        Share
                    </button>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-16">
            <div class="text-gray-400 mb-4">
                <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                </svg>
            </div>
            <h3 class="text-lg sm:text-xl font-semibold text-gray-600 mb-2">No music tracks found</h3>
            <p class="text-gray-500">New tracks will appear here when available.</p>
        </div>
    @endforelse
</div>


    <!-- youtube_video_area  -->

    
<!-- Latest Videos Section -->
<div class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12 sm:mb-16">
            <span class="inline-block px-4 py-2 bg-purple-100 text-purple-800 text-sm font-medium rounded-full mb-4">
                Video Gallery
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Latest Videos</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-purple-600 to-pink-600 mx-auto"></div>
        </div>
        
        <!-- Video Cards Grid Container -->
        <div class="mb-12 sm:mb-16">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-8">
                @forelse($videos as $video)
                    <div class="group">
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 h-full flex flex-col">
                            <!-- Video Card Header -->
                            <div class="relative">
                                <span class="absolute top-4 right-4 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs font-bold px-3 py-1 rounded-full z-10 shadow-lg">
                                    NEW
                                </span>
                                
                                <!-- Video Container -->
                                <div class="relative w-full aspect-video bg-gray-100">
                                    <video class="w-full h-full object-cover" controls preload="metadata"
                                        poster="{{ $video->thumbnail ? asset('storage/' . $video->thumbnail) : asset('user/img/no-thumb.png') }}">
                                        <source src="{{ asset('storage/' . $video->video_file) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                            
                            <!-- Video Card Footer -->
                            <div class="p-4 sm:p-6 flex-grow flex flex-col">
                                <span class="inline-block bg-purple-100 text-purple-800 text-xs font-medium px-2 py-1 rounded-full mb-3 self-start">
                                    {{ $video->year }}
                                </span>
                                <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-2 line-clamp-2 group-hover:text-purple-600 transition-colors duration-300">
                                    {{ $video->title }}
                                </h3>
                                <div class="flex items-center text-gray-500 text-sm mt-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>3:45 min</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <div class="text-gray-400 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-600 mb-2">No videos uploaded yet</h3>
                        <p class="text-gray-500">Check back soon for new video content!</p>
                    </div>
                @endforelse
            </div>
        </div>
        
       
           
        </div>
    </div>
</div>
    <!-- //youtube_video_area  -->

<!-- Contact RSVP Section -->
<section class="py-16 mt-48 sm:py-20 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=%2240%22 height=%2240%22 viewBox=%220 0 40 40%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23a855f7%22 fill-opacity=%220.05%22%3E%3Ccircle cx=%2220%22 cy=%2220%22 r=%221%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h3 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-8">Contact For RSVP</h3>
        <a href="{{ url('/contact') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-full hover:from-purple-700 hover:to-pink-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
            <i class="fas fa-envelope mr-2"></i> Contact Me
        </a>
    </div>
</section>

<style>
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

@endsection




