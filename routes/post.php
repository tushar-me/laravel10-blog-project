<?php

use App\Http\Controllers\Post\ShowPostController;
use App\Http\Controllers\Post\CreatePostController;
use App\Http\Controllers\Post\UpdatePostController;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [ShowPostController::class, 'allPost'])->name('all.post');
Route::get('/create', [CreatePostController::class, 'create'])->name('create.post');
Route::get('/update/slug', [UpdatePostController::class, 'update'])->name('update.post');
Route::get('/post-slug', [ShowPostController::class,'publishedSinglePost'])->name('published.single.post');
Route::get('/post-slug/1', [ShowPostController::class,'pendingSinglePost'])->name('pending.single.post');