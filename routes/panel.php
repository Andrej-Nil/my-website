<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('panel', [\App\Http\Controllers\Admin\PanelController::class, 'index'])->name('panel');

    Route::get('panel/jobs', [\App\Http\Controllers\Admin\JobController::class, 'index'])->name('panel.jobs');

    Route::get('panel/jobs/create', [\App\Http\Controllers\Admin\JobController::class, 'create'])->name('panel.jobs.create');
    Route::post('panel/jobs', [\App\Http\Controllers\Admin\JobController::class, 'store'])->name('panel.jobs.store');
    Route::get('panel/jobs/{id}/edit', [\App\Http\Controllers\Admin\JobController::class, 'edit'])->name('panel.jobs.edit');
    Route::put('panel/jobs/{id}', [\App\Http\Controllers\Admin\JobController::class, 'update'])->name('panel.jobs.update');
    Route::delete('panel/jobs/{id}', [\App\Http\Controllers\Admin\JobController::class, 'destroy'])->name('panel.jobs.delete');
//    Route::get('panel/jobs/search', [\App\Http\Controllers\Admin\JobController::class, 'search'])->name('panel.jobs.search');

    Route::get('panel/portfolios', [\App\Http\Controllers\Admin\PortfolioController::class, 'index'])->name('panel.portfolios');
    Route::get('panel/portfolios/create', [\App\Http\Controllers\Admin\PortfolioController::class, 'create'])->name('panel.portfolios.create');
    Route::post('panel/portfolios/store', [\App\Http\Controllers\Admin\PortfolioController::class, 'store'])->name('panel.portfolios.store');
    Route::get('panel/portfolios/{id}/edit', [\App\Http\Controllers\Admin\PortfolioController::class, 'edit'])->name('panel.portfolios.edit');
    Route::put('panel/portfolios/{id}', [\App\Http\Controllers\Admin\PortfolioController::class, 'update'])->name('panel.portfolios.update');
    Route::delete('panel/portfolios/{id}', [\App\Http\Controllers\Admin\PortfolioController::class, 'destroy'])->name('panel.portfolios.delete');


    Route::get('panel/schools', [\App\Http\Controllers\Admin\SchoolController::class, 'index'])->name('panel.schools');
    Route::get('panel/schools/create', [\App\Http\Controllers\Admin\SchoolController::class, 'create'])->name('panel.schools.create');
    Route::post('panel/schools', [\App\Http\Controllers\Admin\SchoolController::class, 'store'])->name('panel.schools.store');
    Route::get('panel/schools/{id}/edit', [\App\Http\Controllers\Admin\SchoolController::class, 'edit'])->name('panel.schools.edit');
    Route::put('panel/schools/{id}', [\App\Http\Controllers\Admin\SchoolController::class, 'update'])->name('panel.schools.update');
    Route::delete('panel/schools/{id}', [\App\Http\Controllers\Admin\SchoolController::class, 'destroy'])->name('panel.schools.delete');

    Route::get('panel/qualities', [\App\Http\Controllers\Admin\QualityController::class, 'index'])->name('panel.qualities');
    Route::get('panel/qualities/create', [\App\Http\Controllers\Admin\QualityController::class, 'create'])->name('panel.qualities.create');
    Route::post('panel/qualities', [\App\Http\Controllers\Admin\QualityController::class, 'store'])->name('panel.qualities.store');
    Route::get('panel/qualities/{id}/edit', [\App\Http\Controllers\Admin\QualityController::class, 'edit'])->name('panel.qualities.edit');
    Route::put('panel/qualities/{id}', [\App\Http\Controllers\Admin\QualityController::class, 'update'])->name('panel.qualities.update');
    Route::delete('panel/qualities/{id}', [\App\Http\Controllers\Admin\QualityController::class, 'destroy'])->name('panel.qualities.delete');

//    Route::get('panel/qualities', [\App\Http\Controllers\Admin\QualityController::class, 'index'])->name('panel.qualities');
    Route::get('panel/user-infos/create', [\App\Http\Controllers\Admin\UserInfoController::class, 'create'])->name('panel.userInfos.create');
    Route::post('panel/user-infos', [\App\Http\Controllers\Admin\UserInfoController::class, 'store'])->name('panel.userInfos.store');
    Route::get('panel/user-infos/{id}/edit', [\App\Http\Controllers\Admin\UserInfoController::class, 'edit'])->name('panel.userInfos.edit');
    Route::put('panel/user-infos/{id}', [\App\Http\Controllers\Admin\UserInfoController::class, 'update'])->name('panel.userInfos.update');
    Route::delete('panel/user-infos', [\App\Http\Controllers\Admin\UserInfoController::class, 'destroy'])->name('panel.userInfos.delete');



    Route::get('panel/hobbies', [\App\Http\Controllers\Admin\HobbyController::class, 'index'] )->name('panel.hobbies');
    Route::get('panel/hobbies/create', [\App\Http\Controllers\Admin\HobbyController::class, 'create'] )->name('panel.hobbies.create');
    Route::post('panel/hobbies', [\App\Http\Controllers\Admin\HobbyController::class, 'store'] )->name('panel.hobbies.store');
    Route::get('panel/hobbies/{id}/edit', [\App\Http\Controllers\Admin\HobbyController::class, 'edit'] )->name('panel.hobbies.edit');
    Route::put('panel/hobbies/{id}', [\App\Http\Controllers\Admin\HobbyController::class, 'update'] )->name('panel.hobbies.update');
    Route::delete('panel/hobbies/{id}', [\App\Http\Controllers\Admin\HobbyController::class, 'destroy'] )->name('panel.hobbies.delete');
    Route::get('panel/hobbies/search', [\App\Http\Controllers\Admin\HobbyController::class, 'search'] )->name('panel.hobbies.search');

//    Route::get('panel/images', [\App\Http\Controllers\Admin\ImageController::class, 'index'] )->name('panel.images');
//    Route::delete('panel/images/{id}', [\App\Http\Controllers\Admin\ImageController::class, 'destroy'] )->name('panel.images.delete');

//    Route::get('panel/works', [\App\Http\Controllers\Admin\WorkController::class, 'index'] )->name('panel.works');
//    Route::get('panel/works/create', [\App\Http\Controllers\Admin\WorkController::class, 'create'] )->name('panel.works.create');
//    Route::post('panel/works/', [\App\Http\Controllers\Admin\WorkController::class, 'store'] )->name('panel.works.store');
//    Route::get('panel/works/{id}/edit', [\App\Http\Controllers\Admin\WorkController::class, 'edit'] )->name('panel.works.edit');
//    Route::put('panel/works/{id}', [\App\Http\Controllers\Admin\WorkController::class, 'update'] )->name('panel.works.update');
//    Route::delete('panel/works/{id}', [\App\Http\Controllers\Admin\WorkController::class, 'destroy'] )->name('panel.works.delete');


//    Route::get('panel/contacts', [\App\Http\Controllers\Admin\ContactController::class, 'index'] )->name('panel.contacts');
//    Route::get('panel/contacts/create', [\App\Http\Controllers\Admin\ContactController::class, 'create'] )->name('panel.contacts.create');
//    Route::post('panel/contacts', [\App\Http\Controllers\Admin\ContactController::class, 'store'] )->name('panel.contacts.store');
//    Route::get('panel/contacts/{id}/edit', [\App\Http\Controllers\Admin\ContactController::class, 'edit'] )->name('panel.contacts.edit');
//    Route::put('panel/contacts/{id}', [\App\Http\Controllers\Admin\ContactController::class, 'update'] )->name('panel.contacts.update');
//    Route::delete('panel/contacts/{id}', [\App\Http\Controllers\Admin\ContactController::class, 'destroy'] )->name('panel.contacts.delete');


//    Route::resource('panel/posts', \App\Http\Controllers\Admin\PostController::class);

    Route::get('panel/posts', [\App\Http\Controllers\Admin\PostController::class, 'index'] )->name('panel.posts');
    Route::get('panel/posts/create', [\App\Http\Controllers\Admin\PostController::class, 'create'] )->name('panel.posts.create');
    Route::post('panel/posts', [\App\Http\Controllers\Admin\PostController::class, 'store'] )->name('panel.posts.store');
    Route::get('panel/posts/{id}/edit', [\App\Http\Controllers\Admin\PostController::class, 'edit'] )->name('panel.posts.edit');
    Route::put('panel/posts/{id}', [\App\Http\Controllers\Admin\PostController::class, 'update'] )->name('panel.posts.update');
    Route::delete('panel/posts/{id}', [\App\Http\Controllers\Admin\PostController::class, 'destroy'] )->name('panel.posts.delete');

});
