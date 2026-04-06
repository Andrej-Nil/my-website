<?php

namespace App\Http\Controllers;



use App\Repositories\SchoolRepository;
//use App\Repositories\JobPlaceRepository;
use App\Repositories\JobRepository;
use App\Repositories\UserInfoRepository;

class ResumeController extends Controller
{
    public function index(){
        $admin = UserInfoRepository::getUserInfoByFirst();
//        $hobbyList = HobbyRepository::getPagination();
//
//        $jobList = JobRepository::getJobByIdDisplayAndSort();
//        $schoolList = SchoolRepository::getSchoolByIdDisplayAndSort();


        return view('resume', [
            'admin' => $admin
        ]);
    }
}
