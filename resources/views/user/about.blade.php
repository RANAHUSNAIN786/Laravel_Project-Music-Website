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
                About Jack Kalib
            </span>
        </h1>
        <p class="text-lg sm:text-xl text-white/80 max-w-2xl mx-auto leading-relaxed">
            Discover the journey of a passionate musician creating soulful melodies.
        </p>
    </div>
    
    <!-- Floating Music Notes Animation -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/4 text-white/10 text-4xl animate-bounce" style="animation-delay: 0s;">♪</div>
        <div class="absolute top-1/3 right-1/4 text-white/10 text-3xl animate-bounce" style="animation-delay: 1s;">♫</div>
        <div class="absolute bottom-1/4 left-1/3 text-white/10 text-5xl animate-bounce" style="animation-delay: 2s;">♪</div>
    </div>
</div>

<!-- About Area -->
<div class="py-16 sm:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center gap-8 sm:gap-12">
            <!-- Artist Image -->
            <div class="lg:w-1/2">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-400 rounded-3xl transform rotate-3"></div>
                    <div class="relative bg-white p-4 rounded-3xl shadow-xl hover:shadow-2xl transition-shadow duration-300">
                        <img class="w-full h-auto rounded-2xl object-cover" src="{{ asset('user/img/about/about_1.png') }}" alt="Jack Kalib">
                    </div>
                </div>
            </div>
            
            <!-- Artist Info -->
            <div class="lg:w-1/2">
                <div class="text-center lg:text-left">
                    <span class="inline-block px-4 py-2 bg-purple-100 text-purple-800 text-sm font-medium rounded-full mb-6">
                        About the Artist
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Jack Kalib</h2>
                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed mb-6">
                        Esteem spirit temper too say adieus who direct esteem. It esteems luckily or picture placing drawing. Apartments frequently or motionless on reasonable projecting expression.
                    </p>
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-4 sm:gap-6 mb-8">
                        <div class="text-center">
                            <div class="text-2xl sm:text-3xl font-bold text-purple-600">50+</div>
                            <div class="text-gray-600 text-sm">Albums</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl sm:text-3xl font-bold text-purple-600">1M+</div>
                            <div class="text-gray-600 text-sm">Listeners</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl sm:text-3xl font-bold text-purple-600">15</div>
                            <div class="text-gray-600 text-sm">Years</div>
                        </div>
                    </div>
                    <!-- Signature -->
                    <div class="mb-8">
                        <img src="{{ asset('user/img/about/signature.png') }}" alt="Signature" class="h-12 sm:h-16 mx-auto lg:mx-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Singer Video Section -->
<div class="py-16 sm:py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-purple-100 text-purple-800 text-sm font-medium rounded-full mb-4">
                Featured Video
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Watch My Story</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-purple-600 to-pink-600 mx-auto"></div>
        </div>
        <div class="relative rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500">
            <div class="relative w-full aspect-video bg-gray-100">
                <video class="w-full h-full object-cover" controls preload="metadata" poster="{{ asset('user/img/about/singer.png') }}">
                    <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-r from-purple-600/30 to-pink-600/30 opacity-0 hover:opacity-100 transition-opacity duration-500">
                    <a href="https://www.youtube.com/watch?v=Hzmp3z6deF8" target="_blank" class="text-white">
                        <i class="fas fa-play text-5xl sm:text-6xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Gallery Section -->
<div class="py-16 sm:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 sm:mb-16">
            <span class="inline-block px-4 py-2 bg-purple-100 text-purple-800 text-sm font-medium rounded-full mb-4">
                Image Gallery
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Moments Captured</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-purple-600 to-pink-600 mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @foreach (['1.png', '2.png', '3.png', '4.png', '5.png'] as $index => $image)
                <div class="group relative rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2" style="animation-delay: {{ $index * 0.1 }}s; animation: fadeInUp 0.6s ease-out;">
                    <img src="{{ asset('user/img/gallery/' . $image) }}" alt="Gallery Image" class="w-full h-64 sm:h-80 object-cover">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <a href="{{ asset('user/img/gallery/' . $image) }}" target="_blank" class="text-white">
                            <i class="fas fa-search-plus text-3xl sm:text-4xl"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Contact RSVP Section -->
<div class="py-16 sm:py-20 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=%2240%22 height=%2240%22 viewBox=%220 0 40 40%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23a855f7%22 fill-opacity=%220.05%22%3E%3Ccircle cx=%2220%22 cy=%2220%22 r=%221%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h3 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-8">Contact For RSVP</h3>
        <a href="{{ url('/contact') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-full hover:from-purple-700 hover:to-pink-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
            <i class="fas fa-envelope mr-2"></i> Contact Me
        </a>
    </div>
</div>

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