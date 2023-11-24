<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'user_id',
        'category_id',
        'thumbnail',
        'content',
        'category',
        'status'
    ];

    public function category()
    {
        $this->belongsTo(Category::class);
    }
}
