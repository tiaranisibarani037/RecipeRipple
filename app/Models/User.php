<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // Atribut yang dapat diisi secara massal
    protected $fillable = [
        'name', 
        'email', 
        'nomor_telepon',
        'password',  
        'profile_image', // Kolom tambahan jika ada
        'google_id',
        'google_token',
        'google_refresh_token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
