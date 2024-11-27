<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'name',
        'description',
        'video_path',
        'bahan',
        'langkah'
    ];

    protected $casts = [
        'bahan' => 'array', // Converts JSON to array
        'langkah' => 'array', // Converts JSON to array
    ];
}
