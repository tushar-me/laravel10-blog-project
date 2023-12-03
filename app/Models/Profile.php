<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cover_photo',
        'profile_pic',
        'bio',
        'about_title',
        'about_desc'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
