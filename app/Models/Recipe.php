<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
// {
//     protected $fillable = [
//         'name',
//         'kategori_id',
//         'description',
//         'bahan',
//         'cooking_steps',
//         'video',
//         'video_url',
//         'images',
//         'upload_date',
//     ];
//     public function kategori()
//     {
//         return $this->belongsTo(Kategori::class, 'kategori_id');
//     }
// }
{
    use HasFactory;

    protected $fillable = ['name', 'gambar', 'description', 'kategori_id', 'video_path', 'bahan', 'langkah', 'langkah_image'];

    // Specify the attributes that should be cast to native types
    protected $casts = [
        'bahan' => 'array',  // This will automatically convert JSON to an array
        'langkah' => 'array',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}

