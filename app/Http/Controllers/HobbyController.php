<?php

namespace App\Http\Controllers;

use App\Repositories\HobbyRepository;

class HobbyController extends Controller
{
    public function index(){
        $hobbyList = HobbyRepository::getPagination();
        return view('hobby', ['hobbyList' => $hobbyList]);
    }

//'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
}
