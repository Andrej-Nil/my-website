<?php

use Illuminate\Support\Facades\Route;

Route::post('upload/photo', [\App\Http\Controllers\Admin\Api\UploadController::class, 'photo'])->name('upload.photo');
Route::post('jobPlace/update/sort', [\App\Http\Controllers\Admin\Api\JobPlaceApiController::class, 'updateSort'])->name('jobPlace.update.sort');
