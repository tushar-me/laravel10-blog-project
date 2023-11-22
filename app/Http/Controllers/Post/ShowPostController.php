<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowPostController extends Controller
{
    public function  allPost(){
        return view('pages.post.all-post');
    }
    public function publishedSinglePost()
    {
        return view("pages.post.published-single-post");
    }
    public function pendingSinglePost()
    {
        return view("pages.post.pending-single-post");
    }
}
