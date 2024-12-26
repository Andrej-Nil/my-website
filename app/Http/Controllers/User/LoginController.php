<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function loginAuth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials, $request->boolean('remember'))){
            $request->session()->regenerate();
            return redirect()->intended('/');
//            return redirect()->intended('/')->with('success', 'Welcome ' . Auth::user()->name);
        }

        return back()->withErrors([
            'email' => 'Oops mistake!'
        ]);


    }
}
