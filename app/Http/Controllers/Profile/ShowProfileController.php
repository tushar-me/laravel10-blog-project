<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class ShowProfileController extends Controller
{
    public function showProfile($username)
    {
        $user = User::where('username', $username)->first();

        // if (!$user) {
        //     return abort(404); // or redirect to another page or display an error message
        // }
    
        // // Check if the authenticated user is an admin
        // if ($user->isAdmin()) {
        //     return redirect()->route('dashboard');
        // }
        
        $comments = $user->posts()->withCount('comments')->get()->pluck('comments_count')->sum();
        $likes = $user->posts()->withCount('likes')->get()->pluck('likes_count')->sum();

        $profile = $user->profile;
        $pendingPosts = $user->posts()->where('status', 0)->orderBy('updated_at', 'desc')->get();
        $publishedPosts = $user->posts()->where('status', 1)->orderBy('updated_at', 'desc')->get();

        return view("pages.profile.profile", compact('pendingPosts', 'publishedPosts', 'user', 'comments', 'likes'));
    }
}
