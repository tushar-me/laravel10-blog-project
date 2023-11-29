<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ShowPostController extends Controller
{
    public function  allPost(){
        $posts = Post::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('pages.post.all-post', compact('posts'));
    }
    public function publishedSinglePost($category, $slug)
    {
        $post = Post::where('slug', $slug)->with('user', 'comments')->first();
        $recPosts = Post::whereHas('category', function($query) use ($category){
            $query->where('name', $category);
        })
        ->where('status', 1)
        ->where('id', '!=', $post->id)
        ->orderBy('created_at', 'desc')
        ->take(8)
        ->get();
        return view("pages.post.published-single-post", compact('post', 'recPosts'));
    }
    public function pendingSinglePost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view("pages.post.pending-single-post", compact('post'));
    }
}
