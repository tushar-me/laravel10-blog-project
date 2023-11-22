<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    public function updateProfile()
    {
        return view('pages.profile.update');
    }
}
