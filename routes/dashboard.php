<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\SummaryController;
use App\Http\Controllers\Dashboard\PostActionController;

Route::middleware(['admin'])->group(function(){
    Route::get('/dashboard', [SummaryController::class, 'summary'])->name('dashboard');
    
    Route::get('/dashboard/pending/{slug}', [SummaryController::class,'singlePost']);
    Route::get('/approve/{slug}', [PostActionController::class, 'approve']);
    Route::get('/reject/{slug}', [PostActionController::class, 'reject']);
    Route::post('/category/store', [CategoryController::class, 'store']);
});



