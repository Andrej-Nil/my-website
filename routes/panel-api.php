<?php

use Illuminate\Support\Facades\Route;

Route::post('media/api/store', [\App\Http\Controllers\Admin\Api\MediaController::class, 'store'])->name('media.api.store');
Route::delete('media/api/delete', [\App\Http\Controllers\Admin\Api\MediaController::class, 'destroy'])->name('media.api.destroy');
Route::post('hobby/api/update/{id}', [\App\Http\Controllers\Admin\Api\HobbyApiController::class, 'update'])->name('hobby.api.update');
Route::post('jobPlace/update/sort', [\App\Http\Controllers\Admin\Api\JobPlaceApiController::class, 'updateSort'])->name('jobPlace.update.sort');
