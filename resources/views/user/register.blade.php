@extends('partials.user.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 to-purple-900 py-12 px-4 sm:px-6 lg:px-8">
    <div class="relative bg-white/95 backdrop-blur-md p-8 rounded-2xl shadow-2xl w-full max-w-md border border-gray-200/50">

        <!-- Subtle Glow Background (Fixed with pointer-events-none) -->
        <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-400 rounded-2xl opacity-0 hover:opacity-10 blur-xl transition-opacity duration-300 pointer-events-none"></div>

        <h2 class="text-3xl font-bold text-center text-purple-700 mb-8">Create a New Account</h2>

        <form action="{{ route('register.post') }}" method="POST" class="space-y-6 relative z-10">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block mb-1 text-gray-800 font-semibold text-sm">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 text-gray-800 placeholder-gray-400 transition duration-300">
                @error('name')
                    <p class="text-pink-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="block mb-1 text-gray-800 font-semibold text-sm">Address</label>
                <input type="text" name="address" id="address" value="{{ old('address') }}" required
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 text-gray-800 placeholder-gray-400 transition duration-300">
                @error('address')
                    <p class="text-pink-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div>
                <label for="phone" class="block mb-1 text-gray-800 font-semibold text-sm">Phone Number</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 text-gray-800 placeholder-gray-400 transition duration-300">
                @error('phone')
                    <p class="text-pink-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block mb-1 text-gray-800 font-semibold text-sm">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 text-gray-800 placeholder-gray-400 transition duration-300">
                @error('email')
                    <p class="text-pink-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block mb-1 text-gray-800 font-semibold text-sm">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 text-gray-800 placeholder-gray-400 transition duration-300">
                @error('password')
                    <p class="text-pink-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block mb-1 text-gray-800 font-semibold text-sm">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 text-gray-800 placeholder-gray-400 transition duration-300">
            </div>

            <!-- Hidden Role Field -->
            <div class="hidden">
                <label for="role" class="block mb-1 text-gray-800 font-semibold text-sm">Role</label>
                <select name="role" id="role"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 text-gray-800">
                    <option value="customer">Customer</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-3 rounded-full hover:from-purple-700 hover:to-pink-700 font-semibold transition duration-300 transform hover:scale-105 shadow-lg">
                Register
            </button>

            <!-- Working Login Link (Inside Form) -->
            <p class="text-center text-sm mt-6 text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-800 font-semibold transition duration-300">Login</a>
            </p>
        </form>
    </div>
</div>
@endsection
