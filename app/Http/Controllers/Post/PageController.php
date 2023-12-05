<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Models\Category;

class PageController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->where('status', 1)->take(6)->get();

        $gadgetPosts =  Post::whereHas('category', function($query){
            $query->where('name', 'Gadget');
        })
        ->where('status', 1)
        ->orderBy('created_at', 'desc')
        ->get();

        $travelLatest  = Post::whereHas('category', function($query){
            $query->where('name', 'Travel');
        })
        ->where('status', 1)
        ->latest()
        ->first();

        $travelPosts = [];

        if($travelLatest){
            $travelPosts =  Post::whereHas('category', function($query){
                $query->where('name', 'Travel');
            })
            ->where('status', 1)
            ->where('id', '!=', $travelLatest->id)
            ->orderBy('created_at', 'desc')
            ->take(5) 
            ->get();
        }
        
        return view("pages.home", compact('posts', 'gadgetPosts', 'travelPosts', 'travelLatest'));
    }

    
}
