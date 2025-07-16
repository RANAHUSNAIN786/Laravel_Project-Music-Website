<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProjectController extends Controller
{
    /**
     * Show the registration form
     */
    public function showRegisterForm()
    {
        return view('user.register');
    }

    /**
     * Handle registration
     */
public function register(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:255',
        'address'  => 'required|string|max:255',
        'phone'    => 'required|string|max:20',
        'email'    => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = User::create([
        'name'     => $request->name,
        'address'  => $request->address,
        'phone'    => $request->phone,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'role'     => $request->role ?? 'customer',
    ]);

    // ✅ Just redirect to login with role-based message
    if ($user->role === 'admin') {
        return redirect()->route('login')->with('success', 'Admin account created. Please log in.');
    }

    return redirect()->route('login')->with('success', 'Account created. Please log in.');
}

    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('user.login');
    }

    /**
     * Handle login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // 🔁 Redirect based on role
            if (Auth::user()->role === 'admin') {
                return redirect('/dashboard')->with('success', 'Admin logged in successfully!');
            }

            return redirect('/')->with('success', 'Customer logged in successfully!');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out.');
    }
}
