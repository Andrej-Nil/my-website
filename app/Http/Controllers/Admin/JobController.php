<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\StoreJobRequest;
use App\Http\Requests\Job\UpdateJobRequest;
use App\Http\Requests\Search\SearchRequest;
use App\Repositories\JobRepository;
use DateTime;
use Illuminate\Http\Request;

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
        if(isset($validatedData['search'])){
            $search = $validatedData['search'];
        }
        if(isset($data['sort'])){
            if($data['sort'] == 'a-up'){
                $validatedData['sort'] = ['key' => 'title', 'type' => 'ASC', 'label' => 'От А до Я', 'name' => 'a-up'];
            } elseif($data['sort'] == 'z-up') {
                $validatedData['sort'] = ['key' => 'title', 'type' => 'DESC', 'label' => 'От Я до А', 'name' => 'z-up'];
            } elseif($data['sort'] == 'new-up') {
                $validatedData['sort'] = ['key' => 'created_at', 'type' => 'ASC', 'label' => 'Сначало новые', 'name' => 'new-up'];
            } elseif($data['sort'] == 'old-up') {
                $validatedData['sort'] = ['key' => 'created_at', 'type' => 'DESC', 'label' => 'Сначало старые', 'name' => 'old-up'];
            }
        } else {
            $validatedData['sort'] = ['key' => 'sort', 'type' => 'ASC', 'label' => 'По умолчанию', 'name' => null];
        }
        $validatedData['params'] = [];

        if($validatedData['sort']['name']){
            $validatedData['params']['sort'] = $validatedData['sort']['name'];
        }

        if(isset($validatedData['search'])) {
            $validatedData['params']['search'] = $validatedData['search'];
        }

//        dd($validatedData);
        $jobList = JobRepository::getPagination($validatedData);
//        dd($jobList);
//        if(!isset($data['search'])){
//            $jobList = JobRepository::getPagination($data);
//            return  view('panel.job.index', [
//                'jobList' => $jobList,
//                'search' => $data['search'] ??
//            ]);
//        }
//dd($jobList);
        return  view('panel.job.index', [
            'jobList' => $jobList,
            'search' => $search,
            'data' => $validatedData,
            'currentSortTitle' => $validatedData['sort']['label']
        ]);

//        return view('panel.job.index', ['jobList' => $jobList]);
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

    public function search(SearchRequest $request) {
//dd($request->validated());
        $data = $request->validated();
        $jobList = JobRepository::getPagination($data);
        return  view('panel.job.index', [
            'jobList' => $jobList,
            'search' => $data['search']
        ]);
    }
}
