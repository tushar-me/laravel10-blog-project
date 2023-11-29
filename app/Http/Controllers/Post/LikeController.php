<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like; 

class LikeController extends Controller
{
    public function toggleLike($id)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('user.login');
        }

        
        $existingLike = Like::where('post_id', $id)
            ->where('user_id', $user->id)
            ->first();

        if ($existingLike) {
            
            $existingLike->delete();
            $isLiked = false;
        } else {
            $data = [
                'post_id' => $id,
                'user_id' => $user->id,
            ];
            Like::create($data);
            $isLiked = true;
        }

        $likeCount = Like::where('post_id', $id)->count();

        return response()->json(['success' => true, 'likeCount' => $likeCount, 'isLiked' => $isLiked]);
    }
}
