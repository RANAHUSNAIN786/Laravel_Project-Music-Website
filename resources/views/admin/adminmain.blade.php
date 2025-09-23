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
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-200"
      x-data="{ 
        musicOpen: false, 
        videoOpen: false, 
        categoryOpen: false,
        sidebarOpen: false,
        activeLink: 'dashboard',
        darkMode: localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)
      }"
      x-init="
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
        
        // Set active link based on current page
        const path = window.location.pathname;
        if (path.includes('dashboard')) activeLink = 'dashboard';
        else if (path.includes('allmusic')) activeLink = 'allmusic';
        else if (path.includes('video')) activeLink = 'video';
        else if (path.includes('category')) activeLink = 'category';
        else if (path.includes('allusers')) activeLink = 'allusers';
      "
>

    <!-- Mobile Sidebar Overlay -->
    <div x-show="sidebarOpen" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="fixed inset-0 z-40 bg-gray-900 bg-opacity-80 lg:hidden"
         style="display: none;"></div>

    <!-- Layout Container -->
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900">
        
        <!-- Sidebar (Desktop) -->
        <aside class="hidden lg:flex lg:flex-shrink-0">
          <div class="flex flex-col w-64 bg-white dark:bg-gray-800 shadow-xl border-r border-gray-200 dark:border-gray-700">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between h-16 px-6 bg-gradient-to-r from-blue-600 to-blue-700 dark:from-blue-800 dark:to-blue-900">
              <div class="flex items-center">
                <div class="flex-shrink-0 w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                  <i class="fas fa-crown text-white text-xl"></i>
                </div>
                <h2 class="ml-3 text-xl font-bold text-white">Admin Panel</h2>
              </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto text-sm font-medium">
              <!-- Dashboard -->
              <a href="{{ route('dashboard') }}"
                 @click="activeLink = 'dashboard'"
                 :class="activeLink === 'dashboard' ? 
                   'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300 border-r-2 border-blue-600' : 
                   'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
                 class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 group">
                <i class="fas fa-tachometer-alt w-5 text-center mr-3 transition-colors duration-200"
                   :class="activeLink === 'dashboard' ? 'text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-blue-500'"></i>
                <span class="font-medium">Dashboard</span>
              </a>

              <!-- Music -->
              <div>
                <button @click="musicOpen = !musicOpen"
                        :class="musicOpen || activeLink === 'allmusic' ? 
                          'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300' : 
                          'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
                        class="w-full flex items-center justify-between px-4 py-3 rounded-lg transition-all duration-200 group">
                  <span class="flex items-center">
                    <i class="fas fa-music w-5 text-center mr-3 transition-colors duration-200"
                       :class="musicOpen || activeLink === 'allmusic' ? 'text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-blue-500'"></i>
                    <span class="font-medium">Music</span>
                  </span>
                  <i class="fas fa-chevron-down text-xs transition-all duration-200" 
                     :class="musicOpen ? 'rotate-180 text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-blue-500'"></i>
                </button>
                <div x-show="musicOpen" x-transition:enter="transition-all ease-out duration-200"
                     x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-20"
                     x-transition:leave="transition-all ease-in duration-150"
                     x-transition:leave-start="opacity-100 max-h-20" x-transition:leave-end="opacity-0 max-h-0"
                     class="ml-8 mt-1 space-y-1 overflow-hidden">
                  <a href="{{ route('admin.allmusic') }}"
                     @click="activeLink = 'allmusic'"
                     :class="activeLink === 'allmusic' ? 
                       'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300' : 
                       'text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
                     class="block px-3 py-2 rounded-md text-sm transition-all duration-200">
                    All Music
                  </a>
                </div>
              </div>

              <!-- Video -->
              <div>
                <button @click="videoOpen = !videoOpen"
                        :class="videoOpen || activeLink === 'video' ? 
                          'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300' : 
                          'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
                        class="w-full flex items-center justify-between px-4 py-3 rounded-lg transition-all duration-200 group">
                  <span class="flex items-center">
                    <i class="fas fa-video w-5 text-center mr-3 transition-colors duration-200"
                       :class="videoOpen || activeLink === 'video' ? 'text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-blue-500'"></i>
                    <span class="font-medium">Video</span>
                  </span>
                  <i class="fas fa-chevron-down text-xs transition-all duration-200" 
                     :class="videoOpen ? 'rotate-180 text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-blue-500'"></i>
                </button>
                <div x-show="videoOpen" x-transition:enter="transition-all ease-out duration-200"
                     x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-20"
                     x-transition:leave="transition-all ease-in duration-150"
                     x-transition:leave-start="opacity-100 max-h-20" x-transition:leave-end="opacity-0 max-h-0"
                     class="ml-8 mt-1 space-y-1 overflow-hidden">
                  <a href="{{ route('video.index') }}"
                     @click="activeLink = 'video'"
                     :class="activeLink === 'video' ? 
                       'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300' : 
                       'text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
                     class="block px-3 py-2 rounded-md text-sm transition-all duration-200">
                    All Videos
                  </a>
                </div>
              </div>

              <!-- Category -->
              <div>
                <button @click="categoryOpen = !categoryOpen"
                        :class="categoryOpen || activeLink === 'category' ? 
                          'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300' : 
                          'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
                        class="w-full flex items-center justify-between px-4 py-3 rounded-lg transition-all duration-200 group">
                  <span class="flex items-center">
                    <i class="fas fa-layer-group w-5 text-center mr-3 transition-colors duration-200"
                       :class="categoryOpen || activeLink === 'category' ? 'text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-blue-500'"></i>
                    <span class="font-medium">Category</span>
                  </span>
                  <i class="fas fa-chevron-down text-xs transition-all duration-200" 
                     :class="categoryOpen ? 'rotate-180 text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-blue-500'"></i>
                </button>
                <div x-show="categoryOpen" x-transition:enter="transition-all ease-out duration-200"
                     x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-20"
                     x-transition:leave="transition-all ease-in duration-150"
                     x-transition:leave-start="opacity-100 max-h-20" x-transition:leave-end="opacity-0 max-h-0"
                     class="ml-8 mt-1 space-y-1 overflow-hidden">
                  <a href="{{ route('admin.category') }}"
                     @click="activeLink = 'category'"
                     :class="activeLink === 'category' ? 
                       'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300' : 
                       'text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
                     class="block px-3 py-2 rounded-md text-sm transition-all duration-200">
                    Add Category
                  </a>
                </div>
              </div>

              <!-- Users -->
              <a href="{{ route('admin.allusers') }}"
                 @click="activeLink = 'allusers'"
                 :class="activeLink === 'allusers' ? 
                   'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300 border-r-2 border-blue-600' : 
                   'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
                 class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 group">
                <i class="fas fa-users w-5 text-center mr-3 transition-colors duration-200"
                   :class="activeLink === 'allusers' ? 'text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-blue-500'"></i>
                <span class="font-medium">All Users</span>
              </a>

              <!-- Divider -->
              <div class="border-t border-gray-200 dark:border-gray-700 my-4"></div>

              <!-- Logout -->
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="flex items-center w-full px-4 py-3 rounded-lg text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 hover:text-red-700 dark:hover:text-red-300 transition-all duration-200 group">
                  <i class="fas fa-sign-out-alt w-5 text-center mr-3 text-red-500 group-hover:text-red-600 dark:group-hover:text-red-400"></i>
                  <span class="font-medium">Logout</span>
                </button>
              </form>
            </nav>
          </div>
        </aside>

        <!-- Mobile Sidebar -->
        <aside class="lg:hidden fixed inset-y-0 left-0 z-50 w-64 bg-white dark:bg-gray-800 shadow-xl transform transition-transform duration-300 ease-in-out"
               :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
          <div class="flex items-center justify-between h-16 px-6 bg-gradient-to-r from-blue-600 to-blue-700 dark:from-blue-800 dark:to-blue-900">
            <div class="flex items-center">
              <div class="flex-shrink-0 w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <i class="fas fa-crown text-white text-xl"></i>
              </div>
              <h2 class="ml-3 text-xl font-bold text-white">Admin Panel</h2>
            </div>
            <button @click="sidebarOpen = false" class="text-white hover:text-gray-200 transition-colors duration-200">
              <i class="fas fa-times text-xl"></i>
            </button>
          </div>
          
          <!-- Mobile Navigation (same as desktop but with adjusted spacing) -->
          <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto text-sm font-medium">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
               @click="sidebarOpen = false; activeLink = 'dashboard'"
               :class="activeLink === 'dashboard' ? 
                 'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300 border-r-2 border-blue-600' : 
                 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
               class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 group">
              <i class="fas fa-tachometer-alt w-5 text-center mr-3 transition-colors duration-200"
                 :class="activeLink === 'dashboard' ? 'text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-blue-500'"></i>
              <span class="font-medium">Dashboard</span>
            </a>

            <!-- Music -->
            <div>
              <button @click="musicOpen = !musicOpen"
                      :class="musicOpen || activeLink === 'allmusic' ? 
                        'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300' : 
                        'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
                      class="w-full flex items-center justify-between px-4 py-3 rounded-lg transition-all duration-200 group">
                <span class="flex items-center">
                  <i class="fas fa-music w-5 text-center mr-3 transition-colors duration-200"
                     :class="musicOpen || activeLink === 'allmusic' ? 'text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-blue-500'"></i>
                  <span class="font-medium">Music</span>
                </span>
                <i class="fas fa-chevron-down text-xs transition-all duration-200" 
                   :class="musicOpen ? 'rotate-180 text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-blue-500'"></i>
              </button>
              <div x-show="musicOpen" x-transition:enter="transition-all ease-out duration-200"
                   x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-20"
                   x-transition:leave="transition-all ease-in duration-150"
                   x-transition:leave-start="opacity-100 max-h-20" x-transition:leave-end="opacity-0 max-h-0"
                   class="ml-8 mt-1 space-y-1 overflow-hidden">
                <a href="{{ route('admin.allmusic') }}"
                   @click="sidebarOpen = false; activeLink = 'allmusic'"
                   :class="activeLink === 'allmusic' ? 
                     'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300' : 
                     'text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
                   class="block px-3 py-2 rounded-md text-sm transition-all duration-200">
                  All Music
                </a>
              </div>
            </div>

            <!-- Video -->
            <div>
              <button @click="videoOpen = !videoOpen"
                      :class="videoOpen || activeLink === 'video' ? 
                        'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300' : 
                        'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
                      class="w-full flex items-center justify-between px-4 py-3 rounded-lg transition-all duration-200 group">
                <span class="flex items-center">
                  <i class="fas fa-video w-5 text-center mr-3 transition-colors duration-200"
                     :class="videoOpen || activeLink === 'video' ? 'text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-blue-500'"></i>
                  <span class="font-medium">Video</span>
                </span>
                <i class="fas fa-chevron-down text-xs transition-all duration-200" 
                   :class="videoOpen ? 'rotate-180 text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-blue-500'"></i>
              </button>
              <div x-show="videoOpen" x-transition:enter="transition-all ease-out duration-200"
                   x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-20"
                   x-transition:leave="transition-all ease-in duration-150"
                   x-transition:leave-start="opacity-100 max-h-20" x-transition:leave-end="opacity-0 max-h-0"
                   class="ml-8 mt-1 space-y-1 overflow-hidden">
                <a href="{{ route('video.index') }}"
                   @click="sidebarOpen = false; activeLink = 'video'"
                   :class="activeLink === 'video' ? 
                     'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300' : 
                     'text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
                   class="block px-3 py-2 rounded-md text-sm transition-all duration-200">
                  All Videos
                </a>
              </div>
            </div>

            <!-- Category -->
            <div>
              <button @click="categoryOpen = !categoryOpen"
                      :class="categoryOpen || activeLink === 'category' ? 
                        'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300' : 
                        'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
                      class="w-full flex items-center justify-between px-4 py-3 rounded-lg transition-all duration-200 group">
                <span class="flex items-center">
                  <i class="fas fa-layer-group w-5 text-center mr-3 transition-colors duration-200"
                     :class="categoryOpen || activeLink === 'category' ? 'text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-blue-500'"></i>
                  <span class="font-medium">Category</span>
                </span>
                <i class="fas fa-chevron-down text-xs transition-all duration-200" 
                   :class="categoryOpen ? 'rotate-180 text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-blue-500'"></i>
              </button>
              <div x-show="categoryOpen" x-transition:enter="transition-all ease-out duration-200"
                   x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-20"
                   x-transition:leave="transition-all ease-in duration-150"
                   x-transition:leave-start="opacity-100 max-h-20" x-transition:leave-end="opacity-0 max-h-0"
                   class="ml-8 mt-1 space-y-1 overflow-hidden">
                <a href="{{ route('admin.category') }}"
                   @click="sidebarOpen = false; activeLink = 'category'"
                   :class="activeLink === 'category' ? 
                     'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300' : 
                     'text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
                   class="block px-3 py-2 rounded-md text-sm transition-all duration-200">
                  Add Category
                </a>
              </div>
            </div>

            <!-- Users -->
            <a href="{{ route('admin.allusers') }}"
               @click="sidebarOpen = false; activeLink = 'allusers'"
               :class="activeLink === 'allusers' ? 
                 'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300 border-r-2 border-blue-600' : 
                 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
               class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 group">
              <i class="fas fa-users w-5 text-center mr-3 transition-colors duration-200"
                 :class="activeLink === 'allusers' ? 'text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-blue-500'"></i>
              <span class="font-medium">All Users</span>
            </a>

            <!-- Divider -->
            <div class="border-t border-gray-200 dark:border-gray-700 my-4"></div>

            <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit"
                      class="flex items-center w-full px-4 py-3 rounded-lg text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 hover:text-red-700 dark:hover:text-red-300 transition-all duration-200 group">
                <i class="fas fa-sign-out-alt w-5 text-center mr-3 text-red-500 group-hover:text-red-600 dark:group-hover:text-red-400"></i>
                <span class="font-medium">Logout</span>
              </button>
            </form>
          </nav>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
          <!-- Top Header -->
          <header class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
              <div class="flex items-center">
                <!-- Mobile menu button -->
                <button @click="sidebarOpen = true" 
                        class="lg:hidden p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 transition-colors duration-200">
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
                        class="p-2 rounded-lg text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200">
                  <i x-show="!darkMode" class="fas fa-moon text-lg"></i>
                  <i x-show="darkMode" class="fas fa-sun text-lg"></i>
                </button>

                <!-- Notifications -->
                <button class="p-2 rounded-lg text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 relative transition-all duration-200">
                  <i class="fas fa-bell text-lg"></i>
                  <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>

                <!-- Profile -->
                <div class="flex items-center space-x-3">
                  <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center shadow-sm">
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