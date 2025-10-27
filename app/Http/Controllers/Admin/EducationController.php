<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Education\StoreEducationRequest;
use App\Http\Requests\Education\UpdateEducationRequest;
use App\Http\Requests\Sort\UpdateSortRequest;
use App\Models\Education;
use App\Repositories\EducationRepository;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $educationList = EducationRepository::getPagination();
        return (view('panel.education.index', ['educationList' => $educationList]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return (view('panel.education.create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEducationRequest $request)
    {

        $education = EducationRepository::createEducation($request->validated());



        return to_route('panel.educations.edit', $education['id'])->with('success', 'Место обучения создано');
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
        $education = EducationRepository::getEducationById($id);


        if(!$education){
            abort(404);
        }
        return view('panel.education.edit', ['education' => $education]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEducationRequest $request, $id)
    {
        $education = EducationRepository::getEducationById($id);

        if(!$education){
            abort(404);
        }

        EducationRepository::updateEducation($id, $request->validated());

        return to_route('panel.educations.edit', $education['id'])->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $education = EducationRepository::getEducationById($id);

        if(!$education){
            abort(404);
        }

        EducationRepository::deleteEducation($id);
        return to_route('panel.educations')->with('success', 'Место работы ' . "'" . $education['title'] . "'" . ' удалено');
    }
}
