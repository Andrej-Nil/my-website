<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('panel', [\App\Http\Controllers\Admin\PanelController::class, 'index'])->name('panel');


    Route::get('panel/posts', [\App\Http\Controllers\Admin\PostController::class, 'index'] )->name('panel.posts');
    Route::get('panel/posts/search', [\App\Http\Controllers\Admin\PostController::class, 'search'] )->name('panel.posts.search');

    Route::get('panel/posts/create', [\App\Http\Controllers\Admin\PostController::class, 'create'] )->name('panel.posts.create');
    Route::post('panel/posts', [\App\Http\Controllers\Admin\PostController::class, 'store'] )->name('panel.posts.store');
    Route::get('panel/posts/{id}/edit', [\App\Http\Controllers\Admin\PostController::class, 'edit'] )->name('panel.posts.edit');
    Route::put('panel/posts/{id}', [\App\Http\Controllers\Admin\PostController::class, 'update'] )->name('panel.posts.update');
    Route::delete('panel/posts/{id}', [\App\Http\Controllers\Admin\PostController::class, 'destroy'] )->name('panel.posts.delete');

    Route::get('panel/images', [\App\Http\Controllers\Admin\ImageController::class, 'index'] )->name('panel.images');
    Route::delete('panel/images/{id}', [\App\Http\Controllers\Admin\ImageController::class, 'destroy'] )->name('panel.images.delete');
//    Route::resource('panel/posts', \App\Http\Controllers\Admin\PostController::class);
});
