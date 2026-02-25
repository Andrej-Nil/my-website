<?php

namespace App\Http\Controllers\Admin;

use App\Helper\SortDataHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\School\StoreSchoolRequest;
use App\Http\Requests\School\UpdateSchoolRequest;
use App\Http\Requests\Search\SearchRequest;
use App\Http\Requests\Sort\UpdateSortRequest;
use App\Repositories\SchoolRepository;
use Illuminate\Http\Request;

class SchoolController extends Controller
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
        $schoolList = SchoolRepository::getPagination($validatedData);
        return (view('panel.school.index',
            [
                'schoolList' => $schoolList,
                'search' => $search,
                'data' => $validatedData,
                'currentSortTitle' => $validatedData['sort']['label']
            ]
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return (view('panel.school.create'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchoolRequest $request)
    {
        $school = SchoolRepository::createSchool($request->validated());

        return to_route('panel.schools.edit', $school['id'])->with('success', 'Место обучения создано');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $school = SchoolRepository::getSchoolById($id);
        $school['start'] = explode(' ', $school['start'])[0];
        $school['end'] = explode(' ',$school['end'])[0];

        if(!$school){
            abort(404);
        }
        return view('panel.school.edit', ['school' => $school]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolRequest $request, $id)
    {
        $school = SchoolRepository::getSchoolById($id);

        if(!$school){
            abort(404);
        }

        SchoolRepository::updateSchool($id, $request->validated());

        return to_route('panel.schools.edit', $school['id'])->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $school = SchoolRepository::getSchoolById($id);

        if(!$school){
            abort(404);
        }

        SchoolRepository::deleteSchool($id);
        return to_route('panel.schools')->with('success', 'Место работы ' . "'" . $school['title'] . "'" . ' удалено');
    }
}
