<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get(); // Latest users first
        return view('admin.allusers', compact('users'));
    }

    
    // ✅ Show Create User Form
    public function create()
    {
        return view('admin.createuser');
    }

    // ✅ Store New User
  public function store(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'address'  => 'required|string',
        'phone'    => 'required|string', // ✅ Add this line
    ]);

    User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'userid'   => uniqid('USER-'),
        'password' => Hash::make($request->password),
        'address'  => $request->address,
        'phone'    => $request->phone, // ✅ Add this
        'role'     => 'customer', // or 'admin'
    ]);

    return redirect()->route('admin.allusers')->with('success', 'User created successfully.');
}


    // ✅ Delete User
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'User deleted successfully.');
    }




}
