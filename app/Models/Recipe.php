<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'video_path', 'bahan', 'langkah'];

    // Specify the attributes that should be cast to native types
    protected $casts = [
        'bahan' => 'array',  // This will automatically convert JSON to an array
        'langkah' => 'array',
    ];
}
