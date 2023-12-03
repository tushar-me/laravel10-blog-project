<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;

class UpdateProfileController extends Controller
{
    public function editProfile($username)
    {
        $user = User::where('username', $username)->first();
        return view('pages.profile.update', compact('user'));
    }

    public function updateProfile(Request $request, $username)
    {
        $user = User::where('username', $username)->first();
        $user->name = $request->name;
        $user->save();

        $userProfile = $user->profile ?? new profile();
        $userProfile->user_id = $user->id;

        if($request->file('cover_photo')){
            $coverPhoto = time() . '.' . $request->file('cover_photo')->extension();
            $request->file('cover_photo')->move(public_path('uploads'), $coverPhoto);
            $userProfile->cover_photo = $coverPhoto;
        }
        if($request->file('profile_pic')){
            $profilePic =time(). '.'. $request->file('profile_pic')->extension();
            $request->file('profile_pic')->move(public_path('uploads'), $profilePic);
            $userProfile->profile_pic = $profilePic;
        }   
        
        $userProfile->bio = $request->bio;
        $userProfile->about_title = $request->about_title;
        $userProfile->about_desc = $request->about_desc;

        $userProfile->save();

        return redirect()->route('user.profile', ['username' => $username]);
    }    
}
