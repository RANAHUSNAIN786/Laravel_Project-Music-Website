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

.nav-link:not(.active):hover {
    @apply transform hover:scale-105;
}

.mobile-nav-link {
    @apply flex items-center w-full px-4 py-3 text-gray-700 font-medium rounded-xl transition-all duration-300 hover:bg-purple-50 hover:text-purple-600;
}

.mobile-nav-link.active {
    @apply text-white bg-gradient-to-r from-purple-600 to-pink-600 shadow-lg;
}

/* Header scroll effect */
.header-scrolled {
    @apply bg-white/98 shadow-xl;
}

/* Mobile menu animation */
.mobile-menu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-in-out;
}

.mobile-menu.show {
    max-height: 500px;
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
    
    // Header scroll effect
    const header = document.getElementById('main-header');
    let lastScrollTop = 0;
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > 100) {
            header.classList.add('header-scrolled');
        } else {
            header.classList.remove('header-scrolled');
        }
        
        // Hide header on scroll down, show on scroll up
        if (scrollTop > lastScrollTop && scrollTop > 200) {
            header.style.transform = 'translateY(-100%)';
        } else {
            header.style.transform = 'translateY(0)';
        }
        
        lastScrollTop = scrollTop;
    });
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.mobile-menu-button') && !event.target.closest('.mobile-menu')) {
            mobileMenu.classList.add('hidden');
            mobileMenu.classList.remove('show');
            
            // Reset hamburger icon
            const icon = mobileMenuToggle.querySelector('svg');
            icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
        }
    });
});
</script>
