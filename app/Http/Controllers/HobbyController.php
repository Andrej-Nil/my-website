<?php

namespace App\Http\Controllers;

use App\Repositories\HobbyRepository;
use App\Repositories\UserInfoRepository;

class HobbyController extends Controller
{
    public function index(){
        $admin = UserInfoRepository::getUserInfoByFirst();
        $hobbyList = HobbyRepository::getHobbyByIdDisplayAndSort();
        return view('hobby', [
            'hobbyList' => $hobbyList,
            'admin' => $admin
            ]);
    }

//'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
}
