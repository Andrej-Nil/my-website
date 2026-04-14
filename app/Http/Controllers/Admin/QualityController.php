<?php

namespace App\Http\Controllers\Admin;

use App\Helper\SortDataHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Quality\QualityStoreRequest;
use App\Http\Requests\Quality\UpdateQualityRequest;
use App\Http\Requests\Search\SearchRequest;
use App\Models\Quality;
use App\Repositories\QualityRepository;
use Illuminate\Http\Request;

class QualityController extends Controller
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
        $qualityList = QualityRepository::getPagination($validatedData);
        return (view('panel.quality.index',
            [
                'qualityList' => $qualityList,
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
        return (view('panel.quality.create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QualityStoreRequest $request)
    {
        $quality = QualityRepository::createQuality($request->validated());

        return to_route('panel.qualities.edit', $quality['id'])->with('success', 'Качество добавленно');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quality $quality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $quality = QualityRepository::getQualityById($id);


        if(!$quality){
            abort(404);
        }

        return view('panel.quality.edit', ['quality' => $quality]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQualityRequest $request, $id)
    {
        $school = QualityRepository::getQualityById($id);

        if(!$school){
            abort(404);
        }

        QualityRepository::updateQuality($id, $request->validated());

        return to_route('panel.qualities.edit', $school['id'])->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $quality = QualityRepository::getQualityById($id);

        if(!$quality){
            abort(404);
        }

        QualityRepository::deleteQuality($id);

        return to_route('panel.qualities')->with('success', 'Кочество ' . "'" . $quality['title'] . "'" . ' удалено');
    }
}
