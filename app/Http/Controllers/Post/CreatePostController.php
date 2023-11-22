<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreatePostController extends Controller
{
    public function create()
    {
        return view('pages.post.create');
    }
}
