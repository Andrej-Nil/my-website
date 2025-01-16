<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index(){
        return view('about');
    }

//'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
}
