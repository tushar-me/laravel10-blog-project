<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post\PageController;

Route::get('/', [PageController::class,'index'])->name('home');

