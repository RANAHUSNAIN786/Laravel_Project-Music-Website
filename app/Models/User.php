<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'role', // ✅ Add this line
    ];

    /**
     * Hidden attributes for arrays (e.g., when converting to JSON).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
