<?php

namespace App\Http\Controllers\Admin;

use App\Helper\SortDataHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Search\SearchRequest;
use App\Models\Quality;
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
        $qualityList['data'] = [];

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
        dd('xsdjkhhjxcfg');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Quality $quality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quality $quality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quality $quality)
    {
        //
    }
}
