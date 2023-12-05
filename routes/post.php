<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post\CommentController;
use App\Http\Controllers\Post\DeletePostController;
use App\Http\Controllers\Post\LikeController;
use App\Http\Controllers\Post\ShowPostController;
use App\Http\Controllers\Post\CreatePostController;
use App\Http\Controllers\Post\UpdatePostController;

Route::middleware(['auth'])->group(function(){
    Route::get('/posts', [ShowPostController::class, 'allPost'])->name('all.post');
    Route::get('/create', [CreatePostController::class, 'create'])->name('create.post');
    Route::Post('/store', [CreatePostController::class, 'store'])->name('store.post');
    Route::get('/edit/{slug}', [UpdatePostController::class, 'edit'])->name('edit.post');
    Route::post('/update/{slug}', [UpdatePostController::class, 'update'])->name('update.post');
    Route::get('/posts/{category}/{slug}', [ShowPostController::class,'publishedSinglePost'])->name('published.single.post');
    Route::get('/pending/{slug}', [ShowPostController::class,'pendingSinglePost'])->name('pending.single.post');


    Route::post('posts/{id}/toggle-like', [LikeController::class, 'toggleLike'])->name('post.toggleLike');
    Route::post('/comment', [CommentController::class, 'commentStore'])->name('comment.store');

    Route::get('/delete/{slug}', [DeletePostController::class, 'destroy'])->name('delete.post');
});
