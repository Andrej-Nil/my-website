<?php

use Illuminate\Support\Facades\Route;


Route::post('callback', [\App\Http\Controllers\Api\CallbackController::class, 'callback'])->name('callback');
//Route::middleware('guest')->group(function (){
//    Route::get('register', [\App\Http\Controllers\User\RegisterController::class, 'create'])->name('register');
//    Route::post('register', [\App\Http\Controllers\User\RegisterController::class, 'store'])->name('user.store');
//    Route::get('login', [\App\Http\Controllers\User\LoginController::class, 'login'])->name('login');
//    Route::post('login', [\App\Http\Controllers\User\LoginController::class, 'loginAuth'])->name('login.auth');
//
//    Route::get('forgot-password', [\App\Http\Controllers\User\PasswordController::class, 'forgot'])->name('password.request');
//    Route::post('forgot-password', [\App\Http\Controllers\User\PasswordController::class, 'forgotStore'])->name('password.email')->middleware('throttle:20,1');
//    Route::get('/reset-password/{token}', [\App\Http\Controllers\User\PasswordController::class, 'reset'])->name('password.reset');
//    Route::post('/reset-password', [\App\Http\Controllers\User\PasswordController::class, 'update'])->name('password.update');
//});

Route::get('/',  [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


