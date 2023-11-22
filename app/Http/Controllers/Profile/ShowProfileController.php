<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowProfileController extends Controller
{
    public function showProfile()
    {
        return view("pages.profile.profile");
    }
}
