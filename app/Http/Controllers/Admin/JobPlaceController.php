<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobPlace\StoreJobPlaceRequest;
use App\Http\Requests\JobPlace\UpdateJobPlaceRequest;
use App\Repositories\JobPlaceRepository;

class JobPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $jobList = JobPlaceRepository::getPagination();

        return view('panel.job.index', ['jobList' => $jobList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobPlaceRequest $request)
    {

        $job = JobPlaceRepository::createJobPlace($request->validated());
        if(!$job){
            abort(404);
        }

        return to_route('panel.jobs.edit', $job['id'])->with('success', 'Место работы создано');

    }

    /**
     * Display the specified resource.
     */
//    public function show(Job $placeWork)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $job = JobPlaceRepository::getJobPlaceById($id);
        if(!$job){
            abort(404);
        }
//        return to_route('panel.jobs.edit', $job['id']);
        return view('panel.job.edit', ['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobPlaceRequest $request, $id)
    {

        $job = JobPlaceRepository::getJobPlaceById($id);
        if(!$job){
            abort(404);
        }
        JobPlaceRepository::updateJobPlace($id, $request->validated());


        return to_route('panel.jobs.edit', $job['id'])->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $job = JobPlaceRepository::getJobPlaceById($id);
        if(!$job){
            abort(404);
        }

        JobPlaceRepository::deleteJobPlace($id);
        return to_route('panel.jobs')->with('success', 'Место работы ' . "'" . $job['title'] . "'" . ' удалено');
    }
}
