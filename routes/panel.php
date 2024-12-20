<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('panel', [\App\Http\Controllers\Admin\PanelController::class, 'index'])->name('panel');
    Route::resource('panel.post', \App\Http\Controllers\Admin\PostController::class)->name('panel.post');
});
