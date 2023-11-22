<?php

use App\Http\Controllers\Profile\ShowProfileController;
use App\Http\Controllers\Profile\UpdateProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/username', [ShowProfileController::class, 'showProfile'])->name('user.profile');
Route::get('/username/update', [UpdateProfileController::class, 'updateProfile'])->name('update.profile');