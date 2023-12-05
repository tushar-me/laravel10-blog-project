<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Profile\ShowProfileController;
use App\Http\Controllers\Profile\UpdateProfileController;


Route::middleware('auth')->group(function(){
    Route::get('/{username}', [ShowProfileController::class, 'showProfile'])->name('user.profile');
    Route::get('/{username}/edit', [UpdateProfileController::class, 'editProfile'])->name('edit.profile');
    Route::post('/{username}/update', [UpdateProfileController::class, 'updateProfile']);
});
