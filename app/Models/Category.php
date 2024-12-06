<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['category_name'];
    public $timestamps = true;

    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'kategori_id');
    }
}