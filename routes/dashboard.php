<?php

use App\Http\Controllers\Dashboard\SummaryController;
use App\Http\Controllers\Dashboard\PostActionController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard',[SummaryController::class, 'index'])->name('dashboard');
Route::get('/dashboard/pending/{slug}', [SummaryController::class,'singlePost']);
Route::get('/approve/{slug}', [PostActionController::class, 'approve']);
Route::get('/reject/{slug}', [PostActionController::class, 'reject']);