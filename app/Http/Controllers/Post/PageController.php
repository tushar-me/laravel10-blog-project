<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PageController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->take(6)->get();

        $gadgetPosts =  Post::whereHas('category', function($query){
            $query->where('name', 'Gadget');
        })
        ->where('status', 1)
        ->orderBy('created_at', 'desc')
        ->get();

        $travelPosts =  Post::whereHas('category', function($query){
            $query->where('name', 'Travel');
        })
        ->orderBy('created_at', 'desc')
        ->take(5) 
        ->get();
        return view("pages.home", compact('posts', 'gadgetPosts', 'travelPosts'));
    }
}
