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
                MusicVibes Blog
            </span>
        </h1>
        <p class="text-lg sm:text-xl text-white/80 max-w-2xl mx-auto leading-relaxed">
            Stay updated with the latest music news, artist insights, and exclusive content.
        </p>
    </div>
    
    <!-- Floating Music Notes Animation -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/4 text-white/10 text-4xl animate-bounce" style="animation-delay: 0s;">♪</div>
        <div class="absolute top-1/3 right-1/4 text-white/10 text-3xl animate-bounce" style="animation-delay: 1s;">♫</div>
        <div class="absolute bottom-1/4 left-1/3 text-white/10 text-5xl animate-bounce" style="animation-delay: 2s;">♪</div>
    </div>
</div>

<!-- Blog Area -->
<section class="py-16 sm:py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Blog Content -->
            <div class="lg:w-2/3">
                <div class="space-y-8">
                    @forelse ($posts ?? [] as $post)
                        <article class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-1">
                            <div class="flex flex-col sm:flex-row">
                                <!-- Blog Image -->
                                <div class="sm:w-1/3 relative">
                                    <img src="{{ asset('storage/' . ($post->image ?? 'user/img/blog/single_blog_' . ($loop->index % 5 + 1) . '.png')) }}" alt="{{ $post->title ?? 'Blog Image' }}" class="w-full h-48 sm:h-full object-cover">
                                    <div class="absolute top-4 right-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                                        {{ \Carbon\Carbon::parse($post->created_at ?? now())->format('d M') }}
                                    </div>
                                </div>
                                <!-- Blog Details -->
                                <div class="sm:w-2/3 p-6 flex flex-col">
                                    <a href="{{ route('blog.show', $post->slug ?? '#') }}" class="text-xl sm:text-2xl font-bold text-gray-900 mb-3 hover:text-purple-600 transition-colors duration-300 line-clamp-2">
                                        {{ $post->title ?? 'Google inks pact for new 35-storey office' }}
                                    </a>
                                    <p class="text-gray-600 mb-4 text-sm sm:text-base line-clamp-3">
                                        {{ $post->excerpt ?? 'That dominion stars lights dominion divide years for fourth have don’t stars is that he earth it first without heaven in place seed it second morning saying.' }}
                                    </p>
                                    <div class="flex items-center text-gray-500 text-sm mt-auto">
                                        <span class="flex items-center mr-4">
                                            <i class="fas fa-user mr-2"></i>
                                            {{ $post->category ?? 'Travel, Lifestyle' }}
                                        </span>
                                        <span class="flex items-center">
                                            <i class="fas fa-comments mr-2"></i>
                                            {{ $post->comments_count ?? '03' }} Comments
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="text-center py-16">
                            <div class="text-gray-400 mb-4">
                                <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg sm:text-xl font-semibold text-gray-600 mb-2">No posts found</h3>
                            <p class="text-gray-500">Check back soon for new blog content!</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if (!empty($posts) && $posts->hasPages())
                    <nav class="mt-12 flex justify-center">
                        <ul class="flex items-center space-x-2">
                            <li>
                                <a href="{{ $posts->previousPageUrl() ?? '#' }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full hover:bg-purple-100 hover:text-purple-600 transition-all duration-300 {{ $posts->onFirstPage() ? 'opacity-50 cursor-not-allowed' : '' }}">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                            @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                                <li>
                                    <a href="{{ $url }}" class="px-4 py-2 {{ $posts->currentPage() == $page ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-purple-100 hover:text-purple-600' }} rounded-full transition-all duration-300">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endforeach
                            <li>
                                <a href="{{ $posts->nextPageUrl() ?? '#' }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full hover:bg-purple-100 hover:text-purple-600 transition-all duration-300 {{ $posts->hasMorePages() ? '' : 'opacity-50 cursor-not-allowed' }}">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3">
                <div class="space-y-8">
                    <!-- Search Widget (Placeholder, uncomment if implemented) -->
                  
                    <!-- Recent Posts -->
                    <aside class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Posts</h3>
                        @forelse ($recentPosts ?? [] as $recentPost)
                            <div class="flex items-center mb-4 last:mb-0">
                                <img src="{{ asset('storage/' . ($recentPost->image ?? 'user/img/post/post_' . ($loop->index % 4 + 1) . '.png')) }}" alt="Recent Post" class="w-16 h-16 object-cover rounded-lg mr-4">
                                <div>
                                    <a href="{{ route('blog.show', $recentPost->slug ?? '#') }}" class="text-sm font-medium text-gray-900 hover:text-purple-600 transition-colors duration-300 line-clamp-2">
                                        {{ $recentPost->title ?? 'Sample Post Title ' . ($loop->index + 1) }}
                                    </a>
                                    <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($recentPost->created_at ?? now())->diffForHumans() }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-sm">No recent posts available.</p>
                        @endforelse
                    </aside>

                    <!-- Instagram Feeds -->
                    <aside class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Instagram Feeds</h3>
                        <div class="grid grid-cols-3 gap-2">
                            @forelse ($instagramFeeds ?? [] as $feed)
                                <a href="{{ $feed->url ?? '#' }}" class="group relative">
                                    <img src="{{ asset('storage/' . ($feed->image ?? 'user/img/post/post_' . ($loop->index % 6 + 5) . '.png')) }}" alt="Instagram Feed" class="w-full h-24 object-cover rounded-lg">
                                    <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                        <i class="fab fa-instagram text-white text-xl"></i>
                                    </div>
                                </a>
                            @empty
                                <p class="text-gray-500 text-sm col-span-3">No Instagram feeds available.</p>
                            @endforelse
                        </div>
                    </aside>
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