<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'video_path', 'bahan', 'langkah']; // Sesuaikan dengan kolom yang ada pada tabel resep
}