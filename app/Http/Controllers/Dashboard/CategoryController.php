<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request){

        $category = new category;
        $category->name = $request->name;
        $category->save();
        return redirect()->back();
    }
}
