<?php

namespace App\Http\Controllers;

use App\Repositories\HobbyRepository;

class AboutController extends Controller
{
    public function index(){

        $hobbyList = HobbyRepository::getPagination();
        return view('about', ['hobbyList' => $hobbyList]);
    }

//'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
}
