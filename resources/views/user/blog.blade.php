@extends('partials.user.main')

@section('content')

@php
    // Dummy blog posts
    $posts = collect(range(1, 6))->map(function ($i) {
        return (object) [
            'title' => "Sample Blog Post $i",
            'excerpt' => "This is a short description for blog post number $i. Stay tuned for more updates!",
            'slug' => "sample-blog-post-$i",
            'image' => "user/img/blog/single_blog_" . (($i % 5) + 1) . ".png",
            'created_at' => now()->subDays($i),
            'category' => $i % 2 == 0 ? 'Music' : 'Lifestyle',
            'comments_count' => rand(1, 10),
        ];
    });

    // Dummy recent posts
    $recentPosts = collect(range(1, 4))->map(function ($i) {
        return (object) [
            'title' => "Recent Blog Post $i",
            'slug' => "recent-blog-post-$i",
            'image' => "user/img/post/post_" . (($i % 4) + 1) . ".png",
            'created_at' => now()->subHours($i * 5),
        ];
    });

    // Dummy Instagram feeds
    $instagramFeeds = collect(range(1, 6))->map(function ($i) {
        return (object) [
            'url' => "#",
            'image' => "user/img/post/post_" . (($i % 6) + 5) . ".png",
        ];
    });
@endphp

<!-- Hero Section -->
<div class="relative min-h-[50vh] flex items-center justify-center bg-gradient-to-br from-purple-800 via-indigo-900 to-blue-900 overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=%2240%22 height=%2240%22 viewBox=%220 0 40 40%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23ffffff%22 fill-opacity=%220.05%22%3E%3Ccircle cx=%2220%22 cy=%2220%22 r=%221%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
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
</div>

<!-- Blog Area -->
<section class="py-16 sm:py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Blog Content -->
            <div class="lg:w-2/3">
                <div class="space-y-8">
                    @foreach ($posts as $post)
                        <article class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-1">
                            <div class="flex flex-col sm:flex-row">
                                <!-- Blog Image -->
                                <div class="sm:w-1/3 relative">
                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-48 sm:h-full object-cover">
                                    <div class="absolute top-4 right-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                                        {{ \Carbon\Carbon::parse($post->created_at)->format('d M') }}
                                    </div>
                                </div>
                                <!-- Blog Details -->
                                <div class="sm:w-2/3 p-6 flex flex-col">
                                    <a href="#" class="text-xl sm:text-2xl font-bold text-gray-900 mb-3 hover:text-purple-600 transition-colors duration-300 line-clamp-2">
                                        {{ $post->title }}
                                    </a>
                                    <p class="text-gray-600 mb-4 text-sm sm:text-base line-clamp-3">
                                        {{ $post->excerpt }}
                                    </p>
                                    <div class="flex items-center text-gray-500 text-sm mt-auto">
                                        <span class="flex items-center mr-4">
                                            <i class="fas fa-user mr-2"></i>
                                            {{ $post->category }}
                                        </span>
                                        <span class="flex items-center">
                                            <i class="fas fa-comments mr-2"></i>
                                            {{ $post->comments_count }} Comments
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3">
                <div class="space-y-8">
                    <!-- Recent Posts -->
                    <aside class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Posts</h3>
                        @foreach ($recentPosts as $recentPost)
                            <div class="flex items-center mb-4 last:mb-0">
                                <img src="{{ asset($recentPost->image) }}" alt="Recent Post" class="w-16 h-16 object-cover rounded-lg mr-4">
                                <div>
                                    <a href="#" class="text-sm font-medium text-gray-900 hover:text-purple-600 transition-colors duration-300 line-clamp-2">
                                        {{ $recentPost->title }}
                                    </a>
                                    <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($recentPost->created_at)->diffForHumans() }}</p>
                                </div>
                            </div>
                        @endforeach
                    </aside>

                    <!-- Instagram Feeds -->
                    <aside class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Instagram Feeds</h3>
                        <div class="grid grid-cols-3 gap-2">
                            @foreach ($instagramFeeds as $feed)
                                <a href="{{ $feed->url }}" class="group relative">
                                    <img src="{{ asset($feed->image) }}" alt="Instagram Feed" class="w-full h-24 object-cover rounded-lg">
                                    <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                        <i class="fab fa-instagram text-white text-xl"></i>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
