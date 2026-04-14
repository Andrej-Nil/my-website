<?php

namespace App\Http\Controllers\Admin;

use App\Helper\SortDataHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Job\StoreJobRequest;
use App\Http\Requests\Job\UpdateJobRequest;
use App\Http\Requests\Search\SearchRequest;
use App\Repositories\JobRepository;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request)
    {

        $validatedData = $request->validated();
        $data = $request->all();
        $search = '';
        $validatedData['params'] = [];
        if(isset($validatedData['search'])){
            $search = $validatedData['search'];
        }
        if(isset($data['sort'])){
            $validatedData['sort'] = SortDataHelper::handle($data['sort']);
        } else {
            $validatedData['sort'] = ['key' => 'sort', 'type' => 'ASC', 'label' => 'По умолчанию', 'name' => null];
        }

        if($validatedData['sort']['name']){
            $validatedData['params']['sort'] = $validatedData['sort']['name'];
        }

        if(isset($validatedData['search'])) {
            $validatedData['params']['search'] = $validatedData['search'];
        }


        $jobList = JobRepository::getPagination($validatedData);

        return  view('panel.job.index', [
            'jobList' => $jobList,
            'search' => $search,
            'data' => $validatedData,
            'currentSortTitle' => $validatedData['sort']['label']
        ]);

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
    public function store(StoreJobRequest $request)
    {
        $data = $request->validated();
        if($data['is_current']){
            $data['end'] = null;

        }
        $job = JobRepository::createJob($data);

        if(!$job){
            abort(404);
        }
        return to_route('panel.jobs.edit', $job['id'])->with('success', 'Место работы создано');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $job = JobRepository::getJobById($id);
        $job['start'] = explode(' ', $job['start'])[0];
        $job['end'] = explode(' ',$job['end'])[0];
        if(!$job){
            abort(404);
        }
        return view('panel.job.edit', ['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, $id)
    {

        $job = JobRepository::getJobById($id);
        if(!$job){
            abort(404);
        }

        JobRepository::updateJob($id, $request->validated());


        return to_route('panel.jobs.edit', $job['id'])->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $job = JobRepository::getJobById($id);
        if(!$job){
            abort(404);
        }

        JobRepository::deleteJob($id);
        return to_route('panel.jobs')->with('success', 'Место работы ' . "'" . $job['title'] . "'" . ' удалено');
    }

//    public function search(SearchRequest $request) {
////dd($request->validated());
//        $data = $request->validated();
//        $jobList = JobRepository::getPagination($data);
//        return  view('panel.job.index', [
//            'jobList' => $jobList,
//            'search' => $data['search']
//        ]);
//    }
}
