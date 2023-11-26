<?php

namespace App\Http\Controllers\Post;

use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Requests\Post\PostRequest;
use App\Http\Controllers\Controller;
use App\Services\ReadTimeCalculator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Auth;

class CreatePostController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();  
        return view('pages.post.create', compact('categories'));
    }

    public function store(PostRequest $request, ReadTimeCalculator $readTimeCalculator)
    {
        
        try {

            $thumbnail = time(). ".".$request->file('thumbnail')->extension();
            $request->file('thumbnail')->move(public_path('uploads'), $thumbnail);

            $post = new Post;
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->slug = SlugService::createSlug(Post::class, 'slug', $request->title);
            $post->thumbnail = $thumbnail;
            $post->content = $request->content;
            $post->category_id = $request->category;
            $post->author_bio = $request->author_bio;
            $post->read_time = $readTimeCalculator->calculateReadTime($request->content);
            
            $post->Save();

            return response()->json([
                'status' => 'success',
            ]);
            
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e
            ]);
        }
    }
}