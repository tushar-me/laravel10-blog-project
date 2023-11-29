<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ShowProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        $pendingPosts = $user->posts()->where('status', 0)->orderBy('updated_at', 'desc')->get();
        $publishedPosts = $user->posts()->where('status', 1)->orderBy('updated_at', 'desc')->get();
        return view("pages.profile.profile", compact('pendingPosts', 'publishedPosts'));
    }
}
