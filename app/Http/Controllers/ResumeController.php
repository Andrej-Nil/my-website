<?php

namespace App\Http\Controllers;



use App\Repositories\SchoolRepository;
use App\Repositories\JobPlaceRepository;
use App\Repositories\JobRepository;

class ResumeController extends Controller
{
    public function index(){

//        $hobbyList = HobbyRepository::getPagination();

        $jobList = JobRepository::getJobByIdDisplayAndSort();
        $schoolList = SchoolRepository::getSchoolByIdDisplayAndSort();


        return view('resume', [
                'jobList' => $jobList,
                'schoolList' => $schoolList
            ]);
    }
}
