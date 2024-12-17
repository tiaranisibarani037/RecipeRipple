<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama'];
    public $timestamps = true;

    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'kategori_id');
    }
}

