<!-- Include Font Awesome in your layout (head section) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Modern Header -->
<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" id="main-header">
    <div class="bg-white/95 backdrop-blur-md shadow-lg border-b border-gray-100">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo Section -->
                <div class="flex-shrink-0">
                    <a href="{{ url('/') }}" class="flex items-center group">
                        <div class="relative">
                            <img src="{{ asset('user/img/blog/author.png') }}" alt="Logo" class="h-12 w-auto transition-transform duration-300 group-hover:scale-105">
                            <!-- Glow effect on hover -->
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full opacity-0 group-hover:opacity-20 blur-xl transition-opacity duration-300"></div>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-1">
                    <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                        <span>Home</span>
                    </a>
                    <a href="{{ url('/about') }}" class="nav-link {{ request()->is('about') ? 'active' : '' }}">
                        <span>About</span>
                    </a>
                    <a href="{{ url('/track') }}" class="nav-link {{ request()->is('track') ? 'active' : '' }}">
                        <span>Track</span>
                    </a>
                    <a href="{{ url('/blog') }}" class="nav-link {{ request()->is('blog') ? 'active' : '' }}">
                        <span>Blog</span>
                    </a>
                    <a href="{{ url('/contact') }}" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">
                        <span>Contact</span>
                    </a>
                </nav>

                <!-- Desktop Search Bar -->
                <div class="hidden lg:block relative w-72 mx-6">
                    <input type="text" id="search-input" 
                           placeholder="Search music or videos..."
                           class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <div id="search-results" 
                         class="absolute top-12 left-0 w-full bg-white rounded-lg shadow-lg hidden max-h-80 overflow-y-auto z-50">
                        <!-- AJAX Results here -->
                    </div>
                </div>

                <!-- Desktop Auth Section -->
                <div class="hidden lg:flex items-center space-x-4">
                    @guest
                        <!-- Guest Authentication Buttons -->
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('login') }}" 
                               class="px-6 py-2 text-gray-700 font-medium rounded-full hover:text-purple-600 hover:bg-purple-50 transition-all duration-300">
                                Login
                            </a>
                            <a href="{{ route('register') }}" 
                               class="px-6 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-medium rounded-full hover:from-purple-700 hover:to-pink-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                                Register
                            </a>
                        </div>
                    @endguest

                    @auth
                        <!-- Authenticated User Section -->
                        <div class="flex items-center space-x-4">
                            <!-- User Avatar -->
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold rounded-full flex items-center justify-center text-sm shadow-lg">
                                    {{ strtoupper(auth()->user()->name[0]) }}
                                </div>
                                <span class="text-gray-700 font-medium hidden xl:block">{{ auth()->user()->name }}</span>
                            </div>
                            
                            <!-- Direct Logout Button -->
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    <span class="hidden sm:inline">Logout</span>
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden">
                    <button class="mobile-menu-button p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200" id="mobile-menu-toggle">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="lg:hidden mobile-menu hidden bg-white border-t border-gray-100 shadow-lg" id="mobile-menu">
            <div class="container mx-auto px-4 py-4">
                
                <!-- Mobile Search Bar -->
                <div class="relative mb-4">
                    <input type="text" id="mobile-search-input" 
                           placeholder="Search..."
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <div id="mobile-search-results" 
                         class="absolute top-14 left-0 w-full bg-white rounded-lg shadow-lg hidden max-h-80 overflow-y-auto z-50">
                        <!-- AJAX Results -->
                    </div>
                </div>

                <!-- Mobile Navigation Links -->
                <nav class="space-y-2 mb-6">
                    <a href="{{ url('/') }}" class="mobile-nav-link {{ request()->is('/') ? 'active' : '' }}">
                        <i class="fas fa-home mr-3"></i>
                        Home
                    </a>
                    <a href="{{ url('/about') }}" class="mobile-nav-link {{ request()->is('about') ? 'active' : '' }}">
                        <i class="fas fa-user mr-3"></i>
                        About
                    </a>
                    <a href="{{ url('/track') }}" class="mobile-nav-link {{ request()->is('track') ? 'active' : '' }}">
                        <i class="fas fa-music mr-3"></i>
                        Track
                    </a>
                    <a href="{{ url('/blog') }}" class="mobile-nav-link {{ request()->is('blog') ? 'active' : '' }}">
                        <i class="fas fa-blog mr-3"></i>
                        Blog
                    </a>
                    <a href="{{ url('/contact') }}" class="mobile-nav-link {{ request()->is('contact') ? 'active' : '' }}">
                        <i class="fas fa-envelope mr-3"></i>
                        Contact
                    </a>
                </nav>

                <!-- Mobile Auth Section -->
                @guest
                    <div class="space-y-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('login') }}" 
                           class="block w-full text-center px-6 py-3 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-all duration-300">
                            Login
                        </a>
                        <a href="{{ route('register') }}" 
                           class="block w-full text-center px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-medium rounded-xl hover:from-purple-700 hover:to-pink-700 transition-all duration-300 shadow-lg">
                            Register
                        </a>
                    </div>
                @endguest

                @auth
                    <div class="pt-4 border-t border-gray-100">
                        <!-- Mobile User Info -->
                        <div class="flex items-center space-x-3 mb-4 p-3 bg-gray-50 rounded-xl">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold rounded-full flex items-center justify-center">
                                {{ strtoupper(auth()->user()->name[0]) }}
                            </div>
                            <div class="flex-1">
                                <p class="font-medium text-gray-900">{{ auth()->user()->name }}</p>
                                <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        
                        <!-- Mobile Logout Button -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center justify-center w-full px-4 py-3 bg-red-500 hover:bg-red-600 text-white font-medium rounded-xl transition-all duration-300 shadow-lg">
                                <i class="fas fa-sign-out-alt mr-3"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>

<!-- Add some top padding to body to account for fixed header -->
<div class="pt-20"></div>

<style>
/* Custom Navigation Styles */
.nav-link {
    @apply relative px-4 py-2 text-gray-700 font-medium rounded-full transition-all duration-300 hover:text-purple-600 hover:bg-purple-50;
}

.nav-link.active {
    @apply text-white bg-gradient-to-r from-purple-600 to-pink-600 shadow-lg;
}

.mobile-nav-link {
    @apply flex items-center w-full px-4 py-3 text-gray-700 font-medium rounded-xl transition-all duration-300 hover:bg-purple-50 hover:text-purple-600;
}

.mobile-nav-link.active {
    @apply text-white bg-gradient-to-r from-purple-600 to-pink-600 shadow-lg;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('show');
            
            // Toggle hamburger icon
            const icon = this.querySelector('svg');
            if (mobileMenu.classList.contains('show')) {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
            } else {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
            }
        });
    }

    // AJAX Search (Desktop + Mobile)
    const searchInput = document.getElementById('search-input');
    const searchResults = document.getElementById('search-results');
    const mobileSearchInput = document.getElementById('mobile-search-input');
    const mobileSearchResults = document.getElementById('mobile-search-results');

    async function fetchResults(query, resultBox) {
        if (!query || query.length < 2) {
            resultBox.classList.add('hidden');
            return;
        }
        const response = await fetch(`/ajax-search?q=${encodeURIComponent(query)}`);
        const data = await response.json();
        let html = '';
        if (data.music.length === 0 && data.videos.length === 0) {
            html = `<div class="p-3 text-gray-500">No results found</div>`;
        } else {
            if (data.music.length > 0) {
                html += `<div class="p-2 font-semibold text-purple-600">Music</div>`;
                data.music.forEach(item => {
                    html += `<a href="${item.link}" class="block p-2 hover:bg-purple-50">🎵 ${item.title} <span class="text-sm text-gray-500">(${item.artist})</span></a>`;
                });
            }
            if (data.videos.length > 0) {
                html += `<div class="p-2 font-semibold text-pink-600">Videos</div>`;
                data.videos.forEach(item => {
                    html += `<a href="${item.link}" class="block p-2 hover:bg-pink-50">🎬 ${item.title} <span class="text-sm text-gray-500">(${item.artist})</span></a>`;
                });
            }
        }
        resultBox.innerHTML = html;
        resultBox.classList.remove('hidden');
    }

    if (searchInput) {
        searchInput.addEventListener('input', () => fetchResults(searchInput.value, searchResults));
    }
    if (mobileSearchInput) {
        mobileSearchInput.addEventListener('input', () => fetchResults(mobileSearchInput.value, mobileSearchResults));
    }

    // Hide results on outside click
    document.addEventListener('click', (e) => {
        if (!e.target.closest('#search-input')) searchResults.classList.add('hidden');
        if (!e.target.closest('#mobile-search-input')) mobileSearchResults.classList.add('hidden');
    });
});
</script>
