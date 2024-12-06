<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{

    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'kategori_id',
        'video_path',
        'bahan',
        'langkah',
        'langkah_image'
    ];

    protected $casts = [
        'bahan' => 'array', // Converts JSON to array
        'langkah' => 'array', // Converts JSON to array
        'langkah_image' => 'array', // Converts JSON to array
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }
}
