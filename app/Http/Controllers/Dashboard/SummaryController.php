<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class SummaryController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 0)->orderBy('created_at', 'desc')->get();
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('pages.dashboard.home', compact('posts', 'categories'));
    }
    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('pages.dashboard.pending-single-post', compact('post'));
    }
}
