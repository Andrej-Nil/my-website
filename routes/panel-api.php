<?php

use Illuminate\Support\Facades\Route;

Route::post('media/api/store', [\App\Http\Controllers\Admin\Api\MediaController::class, 'store'])->name('media.api.store');
Route::delete('media/api/delete', [\App\Http\Controllers\Admin\Api\MediaController::class, 'destroy'])->name('media.api.destroy');
Route::post('hobby/api/update/{id}', [\App\Http\Controllers\Admin\Api\HobbyApiController::class, 'update'])->name('hobby.api.update');
Route::post('job/update/sort', [\App\Http\Controllers\Admin\Api\JobApiController::class, 'updateSort'])->name('job.update.sort');
Route::post('job/update/display', [\App\Http\Controllers\Admin\Api\JobApiController::class, 'updateDisplay'])->name('job.update.display');
