<?php

namespace App\Http\Controllers\Post;

use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Services\ReadTimeCalculator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Auth;


class UpdatePostController extends Controller
{
    public function edit($slug)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $post = Post::where('slug', $slug)->first();
        return view('pages.post.update', compact('categories','post'));
    }
    public function update(PostUpdateRequest $request, ReadTimeCalculator $readTimeCalculator, $slug)
    {
        
        try {

            $post = Post::where('slug', $slug)->first();
            
            if ($request->hasFile('thumbnail')) {
                $thumbnail = time() . "." . $request->file('thumbnail')->extension();
                $request->file('thumbnail')->move(public_path('uploads'), $thumbnail);
                $post->thumbnail = $thumbnail;
            }
            $post->status = 0;
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->slug = SlugService::createSlug(Post::class, 'slug', $request->title);
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
            ]);
        }
    }
}
