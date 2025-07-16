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
                Get in Touch
            </span>
        </h1>
        <p class="text-lg sm:text-xl text-white/80 max-w-2xl mx-auto leading-relaxed">
            Reach out to share your thoughts, book a session, or join the MusicVibes community!
        </p>
    </div>
    
    <!-- Floating Music Notes Animation -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/4 text-white/10 text-4xl animate-bounce" style="animation-delay: 0s;">♪</div>
        <div class="absolute top-1/3 right-1/4 text-white/10 text-3xl animate-bounce" style="animation-delay: 1s;">♫</div>
        <div class="absolute bottom-1/4 left-1/3 text-white/10 text-5xl animate-bounce" style="animation-delay: 2s;">♪</div>
    </div>
</div>

<!-- Contact Section -->
<section class="py-16 sm:py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Google Maps -->
        <div class="mb-12 rounded-2xl overflow-hidden shadow-lg">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3303.746888763691!2d-118.08415328478252!3d34.080565680593204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2dbb3a97ad7c3%3A0x6ed3b75e4e6ff6b2!2sRosemead%2C%20CA%2091770%2C%20USA!5e0!3m2!1sen!2s!4v1625599340800!5m2!1sen!2s" 
                width="100%" 
                height="480" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="w-full h-full">
            </iframe>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Contact Form -->
            <div class="lg:w-2/3">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-8 text-center lg:text-left">Send a Message</h2>
                <form action="" method="POST" class="space-y-6" id="contactForm">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Your Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 text-gray-900 placeholder-gray-400" 
                                placeholder="Enter your name"
                                required
                            >
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Your Email</label>
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 text-gray-900 placeholder-gray-400" 
                                placeholder="Enter email address"
                                required
                            >
                        </div>
                    </div>
                    <div>
                        <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">Subject</label>
                        <input 
                            type="text" 
                            name="subject" 
                            id="subject" 
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 text-gray-900 placeholder-gray-400" 
                            placeholder="Enter subject"
                            required
                        >
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Your Message</label>
                        <textarea 
                            name="message" 
                            id="message" 
                            rows="6" 
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 text-gray-900 placeholder-gray-400" 
                            placeholder="Enter your message"
                            required
                        ></textarea>
                    </div>
                    <button 
                        type="submit" 
                        class="w-full px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-full hover:from-purple-700 hover:to-pink-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl"
                    >
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="lg:w-1/3 space-y-6">
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-home text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Buttonwood, California</h3>
                            <p class="text-gray-600 text-sm">Rosemead, CA 91770</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-phone-alt text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">00 (440) 9865 562</h3>
                            <p class="text-gray-600 text-sm">Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-envelope text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">support@colorlib.com</h3>
                            <p class="text-gray-600 text-sm">Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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