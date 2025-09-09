@extends('partials.user.main')

@section('content')
<div class="min-h-screen bg-gray-50 pt-24 pb-24">

    <div class="max-w-4xl mx-auto px-4">

        <!-- Audio Detail Card -->
        @if($music)
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="md:flex md:items-center md:space-x-8 p-6 md:p-8">

                <!-- Cover Image -->
                <div class="flex-shrink-0 w-full md:w-1/2 h-72 md:h-96 rounded-xl overflow-hidden shadow-md">
                    <img src="{{ $music->thumbnail ? asset('storage/' . $music->thumbnail) 
                                : ($music->cover_image ? asset('storage/' . $music->cover_image) 
                                : asset('images/default-cover.jpg')) }}" 
                         alt="{{ $music->title ?? 'Untitled' }}" 
                         class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                </div>

                <!-- Details & Audio Player -->
                <div class="mt-6 md:mt-0 md:flex-1 flex flex-col space-y-4">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900">{{ $music->title ?? 'Untitled' }}</h1>
                    <p class="text-gray-700"><span class="font-semibold">Artist:</span> {{ $music->artist ?? 'Unknown' }}</p>
                    <p class="text-gray-700"><span class="font-semibold">Album:</span> {{ $music->album ?? '-' }}</p>
                    <p class="text-gray-700"><span class="font-semibold">Year:</span> {{ $music->year ?? '-' }}</p>
                    <p class="text-gray-600">{{ $music->description ?? 'No description available' }}</p>

                  @php
    $extension = pathinfo($music->audio_file, PATHINFO_EXTENSION);
@endphp

<audio controls class="w-full mt-4 rounded-lg border border-gray-300 shadow-inner">
    @if($extension === 'mp3')
        <source src="{{ asset('storage/' . $music->audio_file) }}" type="audio/mpeg">
    @elseif($extension === 'wav')
        <source src="{{ asset('storage/' . $music->audio_file) }}" type="audio/wav">
    @elseif($extension === 'ogg')
        <source src="{{ asset('storage/' . $music->audio_file) }}" type="audio/ogg">
    @endif
    Your browser does not support the audio element.
</audio>

                </div>
            </div>
        </div>
        @else
            <p class="text-center text-red-500 text-xl">No audio details available.</p>
        @endif

    </div>
</div>
@endsection
