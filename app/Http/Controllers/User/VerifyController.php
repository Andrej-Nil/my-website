<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


class VerifyController extends Controller
{

    public function notice(){
        return view('user.verify-email');
    }

    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect()->route('panel');
    }


    public function send(Request $request){
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }

}
