<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class SummaryController extends Controller
{
    public function summary()
    {
        $pendingPosts = Post::where('status', 0)->orderBy('created_at', 'desc')->get();
        $posts = Post::where('status', 1)->get();
        $likes = Like::count();
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('pages.dashboard.home', compact('pendingPosts', 'posts', 'likes', 'categories'));

    }
    
    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('pages.dashboard.pending-single-post', compact('post'));
    }
}
