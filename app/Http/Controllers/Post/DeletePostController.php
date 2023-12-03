<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class DeletePostController extends Controller
{
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->delete();
        return response()->json(['message' => 'Post deleted successfully']);

    }
}
