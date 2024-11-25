<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment_text', 'user_id', 'isRead'];
    
    public function user()
    {
        return $this->belongsTo(User::class); // Relasi belongsTo karena setiap komentar milik satu user
    }
}
