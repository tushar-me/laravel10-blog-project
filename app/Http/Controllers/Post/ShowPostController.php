<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ShowPostController extends Controller
{
    public function  allPost(){
        return view('pages.post.all-post');
    }
    public function publishedSinglePost($slug)
    {
        // dd($slug);
        $post = Post::where('slug', $slug)->first();
        return view("pages.post.published-single-post", compact('post'));
    }
    public function pendingSinglePost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view("pages.post.pending-single-post", compact('post'));
    }
}
