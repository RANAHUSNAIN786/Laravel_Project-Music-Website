@extends('admin.adminmain')

@section('title', 'All Subscribers')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div x-data="{ view: 'list' }">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Subscribers</h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Manage all your email subscribers</p>
        </div>
        <div class="mt-4 sm:mt-0 flex space-x-2">
            <!-- Toggle -->
            <button @click="view = 'list'"
                    :class="view === 'list' ? 'bg-green-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300'"
                    class="px-4 py-2 text-sm font-medium rounded-lg">
                <i class="fas fa-list mr-2"></i> List
            </button>
            <button @click="view = 'grid'"
                    :class="view === 'grid' ? 'bg-green-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300'"
                    class="px-4 py-2 text-sm font-medium rounded-lg">
                <i class="fas fa-th mr-2"></i> Grid
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-blue-600 dark:text-blue-400 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Subscribers</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $subscribers->count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                    <i class="fas fa-envelope text-green-600 dark:text-green-400 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Recent Subscribers</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $subscribers->take(5)->count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                    <i class="fas fa-calendar-alt text-purple-600 dark:text-purple-400 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Today Subscribers</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $subscribers->where('created_at', '>=', now()->startOfDay())->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Container -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border p-6">
        @if($subscribers->isEmpty())
            <div class="text-center py-16">
                <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-users text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No subscribers found</h3>
                <p class="text-gray-500 dark:text-gray-400">Subscribers will appear here when someone subscribes.</p>
            </div>
        @else
            <!-- LIST VIEW -->
            <div x-show="view === 'list'" class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700/50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">#</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Subscribed At</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($subscribers as $subscriber)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $subscriber->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $subscriber->created_at->format('d M Y, H:i') }}</td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <form action="{{ route('admin.subscriber.delete', $subscriber->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- GRID VIEW -->
            <div x-show="view === 'grid'" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($subscribers as $subscriber)
                <div class="bg-white dark:bg-gray-800 border rounded-xl shadow-sm p-4 flex flex-col justify-between">
                    <div>
                        <i class="fas fa-envelope text-3xl text-blue-500 mb-2"></i>
                        <h4 class="font-medium truncate">{{ $subscriber->email }}</h4>
                        <p class="text-sm text-gray-500">{{ $subscriber->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    <div class="mt-3 flex justify-end">
                        <form action="{{ route('admin.subscriber.delete', $subscriber->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
