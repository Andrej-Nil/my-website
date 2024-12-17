<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class Controller
{
    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        dd($request);
    }

    public function login(){
        return view('user.login');
    }
}
