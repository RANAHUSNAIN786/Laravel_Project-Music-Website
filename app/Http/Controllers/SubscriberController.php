<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    // Store subscriber (Public)
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create([
            'email' => $request->email,
        ]);

        return back()->with('success', 'Thanks for subscribing to MusicVibes!');
    }

    // List all subscribers (Admin)
    public function index()
    {
        $subscribers = Subscriber::latest()->get();
        return view('admin.allsubscribers', compact('subscribers'));
    }

    // Delete a subscriber (Admin)
    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();

        return redirect()->route('admin.allsubscribers')->with('success', 'Subscriber deleted successfully!');
    }
}
