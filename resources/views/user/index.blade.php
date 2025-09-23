@extends('partials.user.main')
@section('content')

<!-- Modern Hero Section -->
<div class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-900 via-blue-900 to-indigo-900 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=%2260%22 height=%2260%22 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23ffffff%22 fill-opacity=%220.05%22%3E%3Ccircle cx=%2230%22 cy=%2230%22 r=%222%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
    
    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-white/80 text-sm font-medium mb-6">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.369 4.369 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"/>
            </svg>
            Professional Musician
        </div>
        <h1 class="text-4xl sm:text-6xl md:text-8xl font-bold text-white mb-6 tracking-tight">
            <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                Musician
            </span>
        </h1>
        <p class="text-lg sm:text-xl text-white/80 max-w-2xl mx-auto mb-8 leading-relaxed">
            Experience the magic of music through soulful melodies and captivating performances
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-full hover:from-purple-700 hover:to-pink-700 transform hover:scale-105 transition-all duration-300 shadow-lg">
                Listen Now
            </button>
            <button class="px-8 py-4 bg-white/10 backdrop-blur-sm text-white font-semibold rounded-full hover:bg-white/20 transition-all duration-300 border border-white/20">
                View Gallery
            </button>
        </div>
    </div>
    
    <!-- Floating Music Notes Animation -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/4 text-white/10 text-4xl animate-bounce" style="animation-delay: 0s;">♪</div>
        <div class="absolute top-1/3 right-1/4 text-white/10 text-3xl animate-bounce" style="animation-delay: 1s;">♫</div>
        <div class="absolute bottom-1/4 left-1/3 text-white/10 text-5xl animate-bounce" style="animation-delay: 2s;">♪</div>
    </div>
</div>

<!-- Featured Track Section -->
<div class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Featured Track</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-purple-600 to-pink-600 mx-auto"></div>
        </div>
        
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden hover:shadow-3xl transition-all duration-500">
            <div class="flex flex-col lg:flex-row">
                <!-- Album Art -->
                <div class="lg:w-1/3 relative">
                    <div class="aspect-square bg-gradient-to-br from-purple-400 to-pink-400 p-8 flex items-center justify-center">
                        <img src="{{ asset('user/img/music_man/1.png') }}" alt="Featured Track" 
                             class="w-full h-full object-cover rounded-2xl shadow-lg">
                    </div>
                </div>
                
                <!-- Track Info -->
                <div class="lg:w-2/3 p-6 sm:p-8 lg:p-12 flex flex-col justify-center">
                    <div class="mb-6">
                        <span class="inline-block px-3 py-1 bg-purple-100 text-purple-800 text-sm font-medium rounded-full mb-4">
                            Latest Release
                        </span>
                        <h3 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Frando Kally</h3>
                        <p class="text-gray-600 text-base sm:text-lg mb-6">Released on 10 November, 2019</p>
                    </div>
                    
                    <!-- Audio Player -->
                    <div class="mb-8">
                        <audio preload="auto" controls class="w-full h-12 rounded-lg">
                            <source src="https://www.w3schools.com/html/horse.mp3">
                        </audio>
                    </div>
                    
                    <!-- Action Button -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#" class="inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-full hover:from-purple-700 hover:to-pink-700 transform hover:scale-105 transition-all duration-300 shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                            </svg>
                            Buy Album
                        </a>
                        <button class="inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-gray-100 text-gray-700 font-semibold rounded-full hover:bg-gray-200 transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                            </svg>
                            Share
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Artist Section -->
<div class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center gap-8 sm:gap-12">
            <!-- Artist Image -->
            <div class="lg:w-1/2">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-400 rounded-3xl transform rotate-6"></div>
                    <div class="relative bg-white p-4 rounded-3xl shadow-2xl">
                        <img class="w-full h-auto rounded-2xl" src="{{ asset('user/img/about/about_1.png') }}" alt="Jack Kalib">
                    </div>
                </div>
            </div>
            
            <!-- Artist Info -->
            <div class="lg:w-1/2">
                <div class="text-center lg:text-left">
                    <span class="inline-block px-4 py-2 bg-purple-100 text-purple-800 text-sm font-medium rounded-full mb-6">
                        About the Artist
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">Jack Kalib</h2>
                    <p class="text-base sm:text-xl text-gray-600 leading-relaxed mb-8">
                        Esteem spirit temper too say adieus who direct esteem. It esteems luckily mr or picture placing drawing no. Apartments frequently or motionless on reasonable projecting expression.
                    </p>
                    
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-4 sm:gap-6 mb-8">
                        <div class="text-center">
                            <div class="text-2xl sm:text-3xl font-bold text-purple-600">50+</div>
                            <div class="text-gray-600">Albums</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl sm:text-3xl font-bold text-purple-600">1M+</div>
                            <div class="text-gray-600">Listeners</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl sm:text-3xl font-bold text-purple-600">15</div>
                            <div class="text-gray-600">Years</div>
                        </div>
                    </div>
                    
                    <!-- Signature -->
                    <div class="mb-8">
                        <img src="{{ asset('user/img/about/signature.png') }}" alt="Signature" class="h-12 sm:h-16 mx-auto lg:mx-0">
                    </div>
                    
                    <!-- Social Links -->
                    <div class="flex justify-center lg:justify-start space-x-4">
                        <a href="#" class="w-10 sm:w-12 h-10 sm:h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center hover:bg-purple-600 hover:text-white transition-all duration-300">
                            <svg class="w-4 sm:w-5 h-4 sm:h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="w-10 sm:w-12 h-10 sm:h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center hover:bg-purple-600 hover:text-white transition-all duration-300">
                            <svg class="w-4 sm:w-5 h-4 sm:h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/></svg>
                        </a>
                        <a href="#" class="w-10 sm:w-12 h-10 sm:h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center hover:bg-purple-600 hover:text-white transition-all duration-300">
                            <svg class="w-4 sm:w-5 h-4 sm:h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<!-- Latest Music Section -->
<div class="mt-20 bg-white py-28">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Heading -->
    <div class="text-center mb-12 sm:mb-16">
      <span
        class="inline-block px-4 py-2 bg-purple-100 text-purple-800 text-sm font-medium rounded-full mb-4"
      >
        Music Collection
      </span>
      <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
        Latest Music
      </h2>
      <div
        class="w-24 h-1 bg-gradient-to-r from-purple-600 to-pink-600 mx-auto"
      ></div>
    </div>

    <!-- Playlist Highlight -->
    <div class="mb-12">
      <div
        class="bg-gradient-to-r from-purple-900 via-blue-900 to-indigo-900 rounded-3xl p-6 sm:p-8 text-white relative overflow-hidden"
      >
        <!-- Background Pattern -->
        <div
          class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=%2260%22 height=%2260%22 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23ffffff%22 fill-opacity=%220.1%22%3E%3Ccircle cx=%2230%22 cy=%2230%22 r=%222%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"
        ></div>

        <div
          class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 items-center"
        >
          <div>
            <h3 class="text-2xl sm:text-3xl font-bold mb-4">
              🎵 Featured Playlist
            </h3>
            <p
              class="text-white/80 mb-6 leading-relaxed text-base sm:text-lg"
            >
              Discover my latest musical journey through carefully crafted
              tracks that tell stories, evoke emotions, and create unforgettable
              moments. Each song is a piece of my soul shared with the world.
            </p>
            <div
              class="flex items-center space-x-4 sm:space-x-6 text-sm text-white/80"
            >
              <div class="flex items-center">
                <svg
                  class="w-5 h-5 mr-2"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.369 4.369 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"
                  />
                </svg>
                {{ $music->count() }} Tracks
              </div>
              <div class="flex items-center">
                <svg
                  class="w-5 h-5 mr-2"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                    clip-rule="evenodd"
                  />
                </svg>
                45 min total
              </div>
            </div>
          </div>
          <div class="text-center lg:text-right">
            <div
              class="inline-flex items-center space-x-4 bg-white/10 backdrop-blur-sm rounded-2xl p-4 sm:p-6"
            >
              <div
                class="w-12 sm:w-16 h-12 sm:h-16 bg-white/20 rounded-full flex items-center justify-center"
              >
                <svg
                  class="w-6 sm:w-8 h-6 sm:h-8 text-white"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
              <div class="text-left">
                <p class="text-white/80 text-sm">Now Playing</p>
                <p class="font-semibold">
                  {{ $music->first()->title ?? 'Select a Track' }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Music Tracks -->
    <div class="space-y-6">
      @forelse($music as $track)
      <div
        class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100"
      >
        <div
          class="flex flex-col md:flex-row items-center p-4 sm:p-6 gap-4 sm:gap-6"
        >
          <!-- Album Cover -->
          <div class="flex-shrink-0">
            <div class="relative group">
              <img
                src="{{ asset('storage/' . $track->cover_image) }}"
                alt="Cover Image"
                class="w-20 sm:w-24 md:w-28 lg:w-32 h-20 sm:h-24 md:h-28 lg:h-32 object-cover rounded-xl shadow-md group-hover:shadow-lg transition-shadow duration-300"
              />
              <div
                class="absolute inset-0 bg-black/25 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center"
              >
                <svg
                  class="w-6 sm:w-8 h-6 sm:h-8 text-white"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path d="M8 5v10l8-5-8-5z" />
                </svg>
              </div>
            </div>
          </div>

          <!-- Track Info -->
          <div class="flex-grow text-center md:text-left">
            <h3
              class="text-lg sm:text-xl md:text-2xl font-bold text-gray-900 mb-1"
            >
              {{ $track->title }}
            </h3>
            <p
              class="text-gray-600 mb-3 flex items-center justify-center md:justify-start text-xs sm:text-sm"
            >
              <svg
                class="w-4 h-4 mr-1.5"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                  clip-rule="evenodd"
                />
              </svg>
              {{ \Carbon\Carbon::parse($track->release_date)->format('d F, Y')
              }}
            </p>

            <!-- Audio Player -->
            <div class="w-full">
              <audio controls class="w-full h-10 rounded-md shadow-sm">
                <source
                  src="{{ asset('storage/' . $track->audio_file) }}"
                  type="audio/mpeg"
                />
                Your browser does not support the audio element.
              </audio>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="flex flex-col gap-2 mt-4 md:mt-0 items-center">
            <!-- Like Button -->
            <button
              class="like-btn px-3 py-1.5 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-pink-100 transition-all duration-300 flex items-center gap-1"
            >
              <svg
                class="w-5 h-5 heart"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                />
              </svg>
              Like
            </button>

            <!-- Share Button -->
            <button
              class="px-3 py-1.5 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition-all duration-300"
            >
              Share
            </button>
          </div>
        </div>
      </div>
      @empty
      <div class="text-center py-16">
        <div class="text-gray-400 mb-4">
          <svg
            class="w-24 h-24 mx-auto"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1"
              d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"
            />
          </svg>
        </div>
        <h3 class="text-lg sm:text-xl font-semibold text-gray-600 mb-2">
          No music tracks found
        </h3>
        <p class="text-gray-500">
          New tracks will appear here when available.
        </p>
      </div>
      @endforelse
    </div>
  </div>
</div>

<!-- Like Button Script -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const likeButtons = document.querySelectorAll(".like-btn");

    likeButtons.forEach((btn) => {
      btn.addEventListener("click", () => {
        const heart = btn.querySelector(".heart");

        if (heart.getAttribute("fill") === "red") {
          heart.setAttribute("fill", "none");
          heart.setAttribute("stroke", "currentColor");
          btn.classList.remove("bg-pink-200", "text-pink-600");
        } else {
          heart.setAttribute("fill", "red");
          heart.setAttribute("stroke", "red");
          btn.classList.add("bg-pink-200", "text-pink-600");
        }
      });
    });
  });
</script>

        <!-- Review Form -->
        @auth
        @if($music->count())
        <div class="mt-12 sm:mt-16">
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl p-6 sm:p-8 border border-purple-100">
                <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-6 text-center">Share Your Review</h3>
                <form action="{{ route('review.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="reviewable_type" value="music">
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Select Music Track:</label>
                        <select name="reviewable_id" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                            @foreach($music as $track)
                                <option value="{{ $track->id }}">{{ $track->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Your Rating:</label>
                        <select name="rating" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                            @for ($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}">{{ str_repeat('★', $i) }} ({{ $i }} star{{ $i > 1 ? 's' : '' }})</option>
                            @endfor
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Your Review:</label>
                        <textarea name="comment" rows="4" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Share your thoughts about this track..."></textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold py-3 rounded-lg hover:from-purple-700 hover:to-pink-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                        Submit Review
                    </button>
                </form>
            </div>
        </div>
        @endif
        @endauth
        
        <!-- Reviews Display -->
        @if($music->flatMap->reviews->count())
        <div class="mt-12 sm:mt-16">
            <div class="bg-gray-50 rounded-2xl p-6 sm:p-8">
                <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-8 text-center">User Reviews</h3>
                <div class="space-y-6">
                    @foreach($music->flatMap->reviews as $review)
                        <div class="bg-white rounded-xl p-4 sm:p-6 shadow-sm border border-gray-100">
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <div class="text-yellow-400 mb-2 text-base sm:text-lg">{{ str_repeat('★', $review->rating) }}</div>
                                    <p class="text-gray-800 leading-relaxed text-sm sm:text-base">{{ $review->comment }}</p>
                                </div>
                                @auth
                                @if($review->user_id === auth()->id() || auth()->user()->role === 'admin')
                                <form action="{{ route('review.destroy', $review->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 p-2 rounded-lg hover:bg-red-50 transition-all duration-300">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </form>
                                @endif
                                @endauth
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-purple-600 font-semibold">{{ substr($review->user->name, 0, 1) }}</span>
                                </div>
                                <span class="font-medium">{{ $review->user->name }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ $review->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection
