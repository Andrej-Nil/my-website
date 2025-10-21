<?php

namespace App\Http\Controllers;



use App\Repositories\JobPlaceRepository;

class ResumeController extends Controller
{
    public function index(){

//        $hobbyList = HobbyRepository::getPagination();

        $jobList = JobPlaceRepository::getJobPlaceByIdDisplayAndSort();

        return view('resume', ['jobList' => $jobList]);
    }

//'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
}
