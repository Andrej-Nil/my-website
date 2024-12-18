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

//    Route::get('/forgot-password', function () {
//        return view('auth.forgot-password');
//    })->middleware('guest')->name('password.request');
    Route::get('forgot-password', function() {
        return view('user.forgot-password');
    })->name('password.request');

    Route::post('forgot-password', [\App\Http\Controllers\UserController::class, 'forgotPasswordStore'])->name('password.email')->middleware('throttle:3,1');
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

    Route::get('logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');

});

