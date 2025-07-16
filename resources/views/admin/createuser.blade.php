@extends('admin.adminmain')

@section('title', 'Add New User')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Create New User</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">Fill out the form to add a new user.</p>
        </div>
        <a href="{{ route('admin.allusers') }}" class="bg-gray-600 hover:bg-gray-700 text-white text-sm px-4 py-2 rounded-lg">
            ← Back to Users
        </a>
    </div>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
            <ul class="list-disc ml-5 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.user.store') }}" method="POST" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <label class="block text-gray-700 dark:text-gray-200 mb-1">Full Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                   class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Email -->
        <div>
            <label class="block text-gray-700 dark:text-gray-200 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Address -->
        <div>
            <label class="block text-gray-700 dark:text-gray-200 mb-1">Address</label>
            <input type="text" name="address" value="{{ old('address') }}" required
                   class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Phone -->
        <div>
            <label class="block text-gray-700 dark:text-gray-200 mb-1">Phone</label>
            <input type="text" name="phone" value="{{ old('phone') }}" required
                   class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Password -->
        <div>
            <label class="block text-gray-700 dark:text-gray-200 mb-1">Password</label>
            <input type="password" name="password" required minlength="8"
                   class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Confirm Password -->
        <div>
            <label class="block text-gray-700 dark:text-gray-200 mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation" required minlength="8"
                   class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Options -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="is_active" value="1" checked
                       class="h-4 w-4 text-green-600 border-gray-300 rounded">
                <span class="text-sm text-gray-700 dark:text-gray-300">Activate Account</span>
            </label>

            <label class="flex items-center space-x-2">
                <input type="checkbox" name="send_welcome_email" value="1" checked
                       class="h-4 w-4 text-green-600 border-gray-300 rounded">
                <span class="text-sm text-gray-700 dark:text-gray-300">Send Welcome Email</span>
            </label>

            <label class="flex items-center space-x-2">
                <input type="checkbox" name="require_password_change" value="1"
                       class="h-4 w-4 text-green-600 border-gray-300 rounded">
                <span class="text-sm text-gray-700 dark:text-gray-300">Force Password Change</span>
            </label>
        </div>

        <!-- Submit -->
        <div class="flex justify-end space-x-4 mt-6">
            <button type="reset" class="px-4 py-2 border rounded text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                Reset
            </button>
            <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow">
                Create User
            </button>
        </div>
    </form>
</div>
@endsection
