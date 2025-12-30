<?php

namespace App\Http\Controllers;



use App\Repositories\EducationRepository;
use App\Repositories\JobPlaceRepository;

class ResumeController extends Controller
{
    public function index(){

//        $hobbyList = HobbyRepository::getPagination();

//        $jobList = JobPlaceRepository::getJobPlaceByIdDisplayAndSort();
//        $educationList = EducationRepository::getEducationByIdDisplayAndSort();
//        return view('resume', [
//            'jobList' => $jobList,
//            'educationList' => $educationList
//            ]

        return view('resume');
    }

//'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
}
