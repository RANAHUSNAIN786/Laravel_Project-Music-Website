@extends('partials.user.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 to-purple-900 py-12 px-4 sm:px-6 lg:px-8">
    <div class="relative bg-white/95 backdrop-blur-md p-8 rounded-2xl shadow-2xl w-full max-w-md border border-gray-200/50">

        <!-- Subtle Glow Effect (Fixed with pointer-events-none) -->
        <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-400 rounded-2xl opacity-0 hover:opacity-10 blur-xl transition-opacity duration-300 pointer-events-none"></div>

        <h2 class="text-3xl font-bold text-center text-purple-700 mb-8">Login to Your Account</h2>

        <!-- Error Message -->
        @if(session('error'))
            <div class="bg-pink-100 border border-pink-400 text-pink-700 px-4 py-3 rounded-full relative mb-6 text-center text-sm font-medium">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="space-y-6 relative z-10">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block mb-1 text-gray-800 font-semibold text-sm">Email</label>
                <input type="email" name="email" id="email" required 
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 text-gray-800 placeholder-gray-400 transition duration-300">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block mb-1 text-gray-800 font-semibold text-sm">Password</label>
                <input type="password" name="password" id="password" required 
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 text-gray-800 placeholder-gray-400 transition duration-300">
            </div>

            <!-- Forgot Password -->
            <div class="text-center mt-3">
                <a href="#" onclick="alert('Password reset feature is currently unavailable.')" class="text-sm text-purple-600 font-semibold hover:text-purple-800 transition duration-300">
                    Forgot password?
                </a>
            </div>

            <!-- Login Button -->
            <button type="submit" 
                class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-3 rounded-full hover:from-purple-700 hover:to-pink-700 font-semibold transition duration-300 transform hover:scale-105 shadow-lg">
                Login
            </button>

            <!-- Register Link -->
            <p class="text-center text-sm mt-6 text-gray-600">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-purple-600 hover:text-purple-800 font-semibold transition duration-300">Register</a>
            </p>
        </form>
    </div>
</div>
@endsection
