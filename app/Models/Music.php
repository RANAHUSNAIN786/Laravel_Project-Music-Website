<?php

namespace App\Models;
use App\Models\Review;


use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = [
    'title', 'artist', 'album', 'year', 'genre', 'audio_file', 'cover_image', 'description'
];

public function reviews()
{
    return $this->morphMany(Review::class, 'reviewable');
}


}
