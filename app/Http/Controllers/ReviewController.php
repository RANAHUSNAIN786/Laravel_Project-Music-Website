<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Music;
use App\Models\Video;


class ReviewController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'reviewable_type' => 'required|string|in:music,video',
        'reviewable_id' => 'required|integer',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string|max:1000',
    ]);

    $type = $request->reviewable_type === 'music' ? Music::class : Video::class;

    $user = Auth::user();
    if (!$user) {
        return back()->with('error', 'You must be logged in to submit a review.');
    }

    Review::create([
        'user_id' => $user->id,
        'reviewable_type' => $type,
        'reviewable_id' => $request->reviewable_id,
        'rating' => $request->rating,
        'comment' => $request->comment,
    ]);

    return back()->with('success', 'Review submitted successfully.');
}


    public function destroy($id)
    {
        $review = Review::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();
        $review->delete();

        return back()->with('success', 'Review deleted successfully.');
    }
}
