<footer class="bg-gradient-to-b from-gray-900 to-gray-800 text-white relative py-10 overflow-hidden min-h-[400px]  ">
    <!-- Optional Background Wave Effect -->
    <div class="absolute inset-0 opacity-10 pointer-events-none z-0">
        <svg class="w-full h-full" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="#a855f7" fill-opacity="0.3" d="M0,160L48,176C96,192,192,224,288,213.3C384,203,480,149,576,138.7C672,128,768,160,864,186.7C960,213,1056,235,1152,213.3C1248,192,1344,128,1392,96L1440,64L1440,320L0,320Z" />
        </svg>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 text-center sm:text-left">
            <!-- Logo + Description -->
            <div class="space-y-6">
                <a href="{{ url('/') }}" class="flex justify-center sm:justify-start items-center group">
                    <div class="relative">
                        <img src="{{ asset('user/img/blog/author.png') }}" alt="Logo"
                             class="h-14 w-auto transition-transform duration-300 group-hover:scale-105 rounded-full">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full opacity-0 group-hover:opacity-20 blur-xl transition-opacity duration-300"></div>
                    </div>
                </a>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Stream, discover, and share your favorite music with MusicVibes. Join our community for exclusive tracks and the latest music updates!
                </p>
                <div class="flex justify-center sm:justify-start space-x-4">
                    <a href="#" class="text-gray-300 hover:text-purple-400 transition transform hover:scale-110"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-300 hover:text-purple-400 transition transform hover:scale-110"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-300 hover:text-purple-400 transition transform hover:scale-110"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-300 hover:text-purple-400 transition transform hover:scale-110"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Navigation Links -->
            <div>
                <h2 class="text-lg font-semibold uppercase tracking-wider mb-4 text-purple-400">Explore</h2>
                <nav class="list-none space-y-3">
                    <li><a href="{{ asset('/index') }}" class="text-gray-300 hover:text-purple-400 {{ Request::is('index') ? 'text-purple-400 font-semibold' : '' }}">Home</a></li>
                    <li><a href="{{ asset('/about') }}" class="text-gray-300 hover:text-purple-400 {{ Request::is('about') ? 'text-purple-400 font-semibold' : '' }}">About</a></li>
                    <li><a href="{{ asset('/track') }}" class="text-gray-300 hover:text-purple-400 {{ Request::is('track') ? 'text-purple-400 font-semibold' : '' }}">Track</a></li>
                    <li><a href="{{ asset('/blog') }}" class="text-gray-300 hover:text-purple-400 {{ Request::is('blog') ? 'text-purple-400 font-semibold' : '' }}">Blog</a></li>
                    <li><a href="{{ asset('/contact') }}" class="text-gray-300 hover:text-purple-400 {{ Request::is('contact') ? 'text-purple-400 font-semibold' : '' }}">Contact</a></li>
                </nav>
            </div>

            <!-- Genres -->
            <div>
                <h2 class="text-lg font-semibold uppercase tracking-wider mb-4 text-purple-400">Genres</h2>
                <nav class="list-none space-y-3">
                    <li><a href="#" class="text-gray-300 hover:text-purple-400">Pop</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-purple-400">Rock</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-purple-400">Electronic</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-purple-400">Hip-Hop</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-purple-400">Jazz</a></li>
                </nav>
            </div>

            <!-- Newsletter Signup -->
            <div>
                <h2 class="text-lg font-semibold uppercase tracking-wider mb-4 text-purple-400">Stay in Tune</h2>
                <form action="#" class="space-y-3">
                    <input type="email" placeholder="Your email address"
                           class="w-full px-4 py-3 rounded-full bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-500 text-white placeholder-gray-400">
                    <button type="submit"
                            class="w-full px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 rounded-full text-white font-semibold transition transform hover:scale-105 shadow-lg">
                        Join Now
                    </button>
                </form>
                <p class="text-gray-300 text-sm mt-3">Get exclusive music releases, event updates, and more!</p>
            </div>
        </div>
    </div>

   
</footer>
