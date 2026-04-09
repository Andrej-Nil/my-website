<?php

namespace App\Http\Controllers;


use App\Repositories\HobbyRepository;
use App\Repositories\QualityRepository;
use App\Repositories\SchoolRepository;
use App\Repositories\JobRepository;
use App\Repositories\UserInfoRepository;

class ResumeController extends Controller
{
    public function index(){
        $admin = UserInfoRepository::getUserInfoByFirst();
//        $hobbyList = HobbyRepository::getPagination();
//
        $jobList = JobRepository::getJobByIdDisplayAndSort();
        $schoolList = SchoolRepository::getSchoolByIdDisplayAndSort();
        $quality = QualityRepository::getQualityByIsDisplay();

        $hobbyList = HobbyRepository::getHobbyByIsDisplay();

        $collectionQuality = collect($quality);
        $professionalQualities = $collectionQuality->where('type', 1);
        $personalQualities = $collectionQuality->where('type', 2);

        return view('resume', [
            'admin' => $admin,
            'jobList' => $jobList,
            'schoolList' => $schoolList,
            'personalQualities' => $personalQualities,
            'professionalQualities' => $professionalQualities,
            'hobbyList' => $hobbyList
        ]);
    }
}
