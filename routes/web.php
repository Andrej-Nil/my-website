<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('dashboard', [\App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard');
});



Route::middleware('guest')->group(function (){
    Route::get('register', [\App\Http\Controllers\UserController::class, 'create'])->name('register');
    Route::post('register', [\App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::get('login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');
    Route::post('login', [\App\Http\Controllers\UserController::class, 'loginAuth'])->name('login.auth');

    Route::get('forgot-password', [\App\Http\Controllers\User\PasswordController::class, 'forgot'])->name('password.request');
    Route::post('forgot-password', [\App\Http\Controllers\User\PasswordController::class, 'forgotStore'])->name('password.email')->middleware('throttle:20,1');
    Route::get('/reset-password/{token}', [\App\Http\Controllers\User\PasswordController::class, 'reset'])->name('password.reset');
    Route::post('/reset-password', [\App\Http\Controllers\User\PasswordController::class, 'update'])->name('password.update');
});




Route::middleware('auth')->group(function (){
    Route::get('verify-email', function () {
        return view('user.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('dashboard');
    })->middleware( 'signed')->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:3,1')->name('verification.send');

    Route::get('logout', [\App\Http\Controllers\User\LogoutController::class, 'logout'])->name('logout');

});

