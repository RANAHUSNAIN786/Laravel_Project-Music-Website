<?php

namespace App\Models;
use App\Models\Review;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
    'video_file', 'youtube_url', 'title', 'artist', 'album',
    'year', 'category', 'thumbnail', 'description',
];


public function reviews()
{
    return $this->morphMany(Review::class, 'reviewable');
}


}
