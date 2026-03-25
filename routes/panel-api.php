<?php

use Illuminate\Support\Facades\Route;

Route::post('media/api/store', [\App\Http\Controllers\Admin\Api\MediaController::class, 'store'])->name('media.api.store');
Route::delete('media/api/delete', [\App\Http\Controllers\Admin\Api\MediaController::class, 'destroy'])->name('media.api.destroy');
Route::post('hobby/api/update/{id}', [\App\Http\Controllers\Admin\Api\HobbyApiController::class, 'update'])->name('hobby.api.update');


Route::post('job/update/sort', [\App\Http\Controllers\Admin\Api\JobApiController::class, 'updateSort'])->name('job.update.sort');
Route::post('job/update/display', [\App\Http\Controllers\Admin\Api\JobApiController::class, 'updateDisplay'])->name('job.update.display');

Route::post('user-infos/api/update/{id}', [\App\Http\Controllers\Admin\Api\UserInfoApiController::class, 'update'])->name('userInfos.api.update');

Route::post('school/update/sort', [\App\Http\Controllers\Admin\Api\SchoolApiController::class, 'updateSort'])->name('school.update.sort');
Route::post('school/update/display', [\App\Http\Controllers\Admin\Api\SchoolApiController::class, 'updateDisplay'])->name('school.update.display');

Route::post('quality/update/sort', [\App\Http\Controllers\Admin\Api\QualityApiController::class, 'updateSort'])->name('quality.update.sort');
Route::post('quality/update/display', [\App\Http\Controllers\Admin\Api\QualityApiController::class, 'updateDisplay'])->name('quality.update.display');
