<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostActionController extends Controller
{
    public function approve($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->status = 1;
        $post->save();
        return redirect()->route('dashboard');
    }
    public function reject($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->delete();
        return redirect()->route('dashboard');
    }
}
