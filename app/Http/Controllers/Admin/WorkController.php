<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Work\StoreWorkRequest;
use App\Http\Requests\Work\UpdateWorkRequest;
use App\Repositories\WorkRepository;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workList = WorkRepository::getPagination();

        return  view('panel.work.index', ['workList' => $workList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('panel.work.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkRequest $request)
    {
        $work = WorkRepository::createWork($request->validated());
        return to_route('panel.works.edit', $work['id'])->with('success', 'Пример работы создан');
    }

    /**
     * Display the specified resource.
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($workId)
    {
       $work = WorkRepository::getWorkById($workId);

        if(!$work){
            abort(404);
        }

        return  view('panel.work.edit', ['work' => $work]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkRequest $request, $workId)
    {
        $work = WorkRepository::getWorkById($workId);

        if(!$work){
            abort(404);
        }
        WorkRepository::updateWork($workId, $request->validated());
        return to_route('panel.works.edit', $work['id'])->with('success', 'Пример работы создан');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($workId)
    {
        $work = WorkRepository::getWorkById($workId);

        if(!$work){
            abort(404);
        }

        WorkRepository::deleteWork($workId);
        return to_route('panel.works')->with('success', 'Пример работы ' . "'" . $work['title'] . "'" . ' удален');
    }
}
