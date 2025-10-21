<?php

namespace App\Http\Controllers;


use App\Repositories\WorkRepository;

class HomeController extends Controller
{

    public function index(){
        $workList = WorkRepository::getWorkByDisplay();
        return view('home', ['workList' => $workList]);
    }
}
