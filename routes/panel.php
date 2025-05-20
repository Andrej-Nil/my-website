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

    Route::get('panel/hobbies', [\App\Http\Controllers\Admin\HobbyController::class, 'index'] )->name('panel.hobbies');
    Route::get('panel/hobbies/create', [\App\Http\Controllers\Admin\HobbyController::class, 'create'] )->name('panel.hobbies.create');
    Route::post('panel/hobbies', [\App\Http\Controllers\Admin\HobbyController::class, 'store'] )->name('panel.hobbies.store');
    Route::get('panel/hobbies/{id}/edit', [\App\Http\Controllers\Admin\HobbyController::class, 'edit'] )->name('panel.hobbies.edit');
    Route::put('panel/hobbies/{id}', [\App\Http\Controllers\Admin\HobbyController::class, 'update'] )->name('panel.hobbies.update');
    Route::delete('panel/hobbies/{id}', [\App\Http\Controllers\Admin\HobbyController::class, 'destroy'] )->name('panel.hobbies.delete');

    Route::get('panel/works', [\App\Http\Controllers\Admin\WorkController::class, 'index'] )->name('panel.works');
    Route::get('panel/works/create', [\App\Http\Controllers\Admin\WorkController::class, 'create'] )->name('panel.works.create');
    Route::post('panel/works/', [\App\Http\Controllers\Admin\WorkController::class, 'store'] )->name('panel.works.store');
    Route::get('panel/works/{id}/edit', [\App\Http\Controllers\Admin\WorkController::class, 'edit'] )->name('panel.works.edit');
    Route::put('panel/works/{id}', [\App\Http\Controllers\Admin\WorkController::class, 'update'] )->name('panel.works.update');
    Route::delete('panel/works/{id}', [\App\Http\Controllers\Admin\WorkController::class, 'destroy'] )->name('panel.works.delete');

    Route::get('panel/images', [\App\Http\Controllers\Admin\ImageController::class, 'index'] )->name('panel.images');
    Route::delete('panel/images/{id}', [\App\Http\Controllers\Admin\ImageController::class, 'destroy'] )->name('panel.images.delete');

    Route::get('panel/contacts', [\App\Http\Controllers\Admin\ContactController::class, 'index'] )->name('panel.contacts');
    Route::get('panel/contacts/create', [\App\Http\Controllers\Admin\ContactController::class, 'create'] )->name('panel.contacts.create');
    Route::post('panel/contacts', [\App\Http\Controllers\Admin\ContactController::class, 'store'] )->name('panel.contacts.store');
    Route::get('panel/contacts/{id}/edit', [\App\Http\Controllers\Admin\ContactController::class, 'edit'] )->name('panel.contacts.edit');
    Route::put('panel/contacts/{id}', [\App\Http\Controllers\Admin\ContactController::class, 'update'] )->name('panel.contacts.update');
    Route::delete('panel/contacts/{id}', [\App\Http\Controllers\Admin\ContactController::class, 'destroy'] )->name('panel.contacts.delete');
//    Route::resource('panel/posts', \App\Http\Controllers\Admin\PostController::class);
});
