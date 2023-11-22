<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdatePostController extends Controller
{
    public function update()
    {
        return view('pages.post.update');
    }
}
