<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // A category can have many videos
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    // A category can have many music files
    public function music()
    {
        return $this->hasMany(Music::class);
    }
}
