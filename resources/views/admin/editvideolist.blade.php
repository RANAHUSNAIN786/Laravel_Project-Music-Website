@extends('admin.adminmain')

@section('title', 'Edit Videos')

@section('content')

@if(session('success'))
    <div class="bg-green-100 dark:bg-green-800 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-100 px-4 py-3 rounded mb-6">
        <strong>Success:</strong> {{ session('success') }}
    </div>
@endif

<div class="bg-white dark:bg-dark-card p-8 rounded-xl shadow-xl">
    <h2 class="text-2xl font-bold mb-6 text-blue-700 dark:text-blue-400">
        <i class="fas fa-edit mr-2"></i> All Videos (Edit)
    </h2>

    @if(empty($videos))
        <p class="text-gray-600 dark:text-gray-300">No videos found.</p>
    @else
    <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-200">
        <thead class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white">
            <tr>
                <th class="p-3">Title</th>
                <th class="p-3">Artist</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($videos as $video)
                <tr class="border-b dark:border-gray-600">
                    <td class="p-3">{{ $video->title }}</td>
                    <td class="p-3">{{ $video->artist }}</td>
                    <td class="p-3">
                        <a href="{{ route('video.edit', $video->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
