<?php

use Illuminate\Support\Facades\Route;


Route::get('/',  [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('guest')->group(function (){
    Route::get('register', [\App\Http\Controllers\User\RegisterController::class, 'create'])->name('register');
    Route::post('register', [\App\Http\Controllers\User\RegisterController::class, 'store'])->name('user.store');
    Route::get('login', [\App\Http\Controllers\User\LoginController::class, 'login'])->name('login');
    Route::post('login', [\App\Http\Controllers\User\LoginController::class, 'loginAuth'])->name('login.auth');

    Route::get('forgot-password', [\App\Http\Controllers\User\PasswordController::class, 'forgot'])->name('password.request');
    Route::post('forgot-password', [\App\Http\Controllers\User\PasswordController::class, 'forgotStore'])->name('password.email')->middleware('throttle:20,1');
    Route::get('/reset-password/{token}', [\App\Http\Controllers\User\PasswordController::class, 'reset'])->name('password.reset');
    Route::post('/reset-password', [\App\Http\Controllers\User\PasswordController::class, 'update'])->name('password.update');
});


Route::middleware('auth')->group(function (){
    Route::get('verify-email', [\App\Http\Controllers\User\VerifyController::class, 'notice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}',  [\App\Http\Controllers\User\VerifyController::class, 'verify'])->middleware( 'signed')->name('verification.verify');
    Route::post('/email/verification-notification', [\App\Http\Controllers\User\VerifyController::class, 'send'])->middleware('throttle:3,1')->name('verification.send');
    Route::get('logout', [\App\Http\Controllers\User\LogoutController::class, 'logout'])->name('logout');
});


Route::resource('post', \App\Http\Controllers\PostController::class);
Route::get('about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('resume', [\App\Http\Controllers\ResumeController::class, 'index'])->name('resume');

