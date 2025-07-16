<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@preline/preline@2.0.0/dist/preline.min.js"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
</head>
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-200" x-data="{ 
    musicOpen: false, 
    videoOpen: false, 
    categoryOpen: false,
    sidebarOpen: false,
    darkMode: localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)
}" x-init="
    $watch('darkMode', val => {
        if (val) {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        }
    });
    if (darkMode) document.documentElement.classList.add('dark');
">

    <!-- Mobile Sidebar Overlay -->
    <div x-show="sidebarOpen" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="fixed inset-0 z-40 bg-gray-600 bg-opacity-75 lg:hidden"
         style="display: none;"></div>

    <!-- Layout Container -->
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900">
        <!-- Sidebar -->
        <aside class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64 bg-white dark:bg-gray-800 shadow-xl">
                <!-- Sidebar Header -->
                <div class="flex items-center justify-between h-16 px-6 bg-gradient-to-r from-blue-600 to-blue-700 dark:from-blue-700 dark:to-blue-800">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                            <i class="fas fa-crown text-blue-600 text-lg"></i>
                        </div>
                        <h2 class="ml-3 text-xl font-bold text-white">Admin Panel</h2>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-3 py-6 space-y-1 overflow-y-auto">
                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}" 
                       class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-white transition-all duration-200">
                        <i class="fas fa-tachometer-alt mr-3 text-gray-400 group-hover:text-blue-500"></i>
                        Dashboard
                    </a>

                    <!-- Music Dropdown -->
                    <div class="space-y-1">
                        <button @click="musicOpen = !musicOpen" 
                                class="group w-full flex items-center justify-between px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-white transition-all duration-200">
                            <div class="flex items-center">
                                <i class="fas fa-music mr-3 text-gray-400 group-hover:text-blue-500"></i>
                                Music
                            </div>
                            <i class="fas fa-chevron-down transition-transform duration-200" 
                               :class="musicOpen ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="musicOpen" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="ml-6 space-y-1"
                             style="display: none;">
                            <a href="{{ route('admin.allmusic') }}" 
                               class="block px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors duration-200">
                                All Music
                            </a>
                            <a href="{{ route('admin.music') }}" 
                               class="block px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors duration-200">
                                Add Music
                            </a>
                            <a href="{{ route('music.editview') }}" 
                               class="block px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors duration-200">
                                Edit Music
                            </a>
                            <a href="{{ route('music.deleteview') }}" 
                               class="block px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors duration-200">
                                Delete Music
                            </a>
                        </div>
                    </div>

                    <!-- Video Dropdown -->
                    <div class="space-y-1">
                        <button @click="videoOpen = !videoOpen" 
                                class="group w-full flex items-center justify-between px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-white transition-all duration-200">
                            <div class="flex items-center">
                                <i class="fas fa-video mr-3 text-gray-400 group-hover:text-blue-500"></i>
                                Video
                            </div>
                            <i class="fas fa-chevron-down transition-transform duration-200" 
                               :class="videoOpen ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="videoOpen" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="ml-6 space-y-1"
                             style="display: none;">
                            <a href="{{ route('video.index') }}" 
                               class="block px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors duration-200">
                                All Videos
                            </a>
                            <a href="{{ route('admin.video') }}" 
                               class="block px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors duration-200">
                                Add Video
                            </a>
                            <a href="{{ route('video.editview') }}" 
                               class="block px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors duration-200">
                                Edit Video
                            </a>
                            <a href="{{ route('video.deleteview') }}" 
                               class="block px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors duration-200">
                                Delete Video
                            </a>
                        </div>
                    </div>

                    <!-- Category Dropdown -->
                    <div class="space-y-1">
                        <button @click="categoryOpen = !categoryOpen" 
                                class="group w-full flex items-center justify-between px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-white transition-all duration-200">
                            <div class="flex items-center">
                                <i class="fas fa-layer-group mr-3 text-gray-400 group-hover:text-blue-500"></i>
                                Category
                            </div>
                            <i class="fas fa-chevron-down transition-transform duration-200" 
                               :class="categoryOpen ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="categoryOpen" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="ml-6 space-y-1"
                             style="display: none;">
                            <a href="{{ route('admin.category') }}" 
                               class="block px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors duration-200">
                                Add Category
                            </a>
                        </div>
                    </div>

                    <!-- Users -->
                    <a href="{{ route('admin.allusers') }}" 
                       class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-white transition-all duration-200">
                        <i class="fas fa-users mr-3 text-gray-400 group-hover:text-blue-500"></i>
                        All Users
                    </a>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 dark:border-gray-700 my-4"></div>

                    <!-- Logout -->
                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" 
                                class="group w-full flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 hover:text-red-700 dark:hover:text-red-300 transition-all duration-200">
                            <i class="fas fa-sign-out-alt mr-3 text-red-500 group-hover:text-red-600"></i>
                            Logout
                        </button>
                    </form>
                </nav>
            </div>
        </aside>

        <!-- Mobile Sidebar -->
        <aside class="lg:hidden fixed inset-y-0 left-0 z-50 w-64 bg-white dark:bg-gray-800 shadow-xl transform transition-transform duration-300 ease-in-out"
               :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            <!-- Same content as desktop sidebar but with close button -->
            <div class="flex items-center justify-between h-16 px-6 bg-gradient-to-r from-blue-600 to-blue-700 dark:from-blue-700 dark:to-blue-800">
                <div class="flex items-center">
                    <div class="flex-shrink-0 w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                        <i class="fas fa-crown text-blue-600 text-lg"></i>
                    </div>
                    <h2 class="ml-3 text-xl font-bold text-white">Admin Panel</h2>
                </div>
                <button @click="sidebarOpen = false" class="text-white hover:text-gray-200">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <!-- Navigation content same as above -->
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                    <div class="flex items-center">
                        <!-- Mobile menu button -->
                        <button @click="sidebarOpen = true" 
                                class="lg:hidden p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        
                        <!-- Page Title -->
                        <h1 class="ml-4 lg:ml-0 text-2xl font-bold text-gray-900 dark:text-white">
                            @yield('title', 'Dashboard')
                        </h1>
                    </div>

                    <!-- Header Actions -->
                    <div class="flex items-center space-x-4">
                        <!-- Dark Mode Toggle -->
                        <button @click="darkMode = !darkMode" 
                                class="p-2 rounded-lg text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                            <i x-show="!darkMode" class="fas fa-moon text-lg"></i>
                            <i x-show="darkMode" class="fas fa-sun text-lg"></i>
                        </button>

                        <!-- Notifications -->
                        <button class="p-2 rounded-lg text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 relative">
                            <i class="fas fa-bell text-lg"></i>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>

                        <!-- Profile -->
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                            <span class="hidden sm:block text-sm font-medium text-gray-700 dark:text-gray-200">Admin</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        // Tailwind config for dark mode
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'dark-bg': '#0f172a',
                        'dark-card': '#1e293b',
                    }
                }
            }
        }
    </script>
</body>
</html>
