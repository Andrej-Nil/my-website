<?php

namespace App\Http\Controllers\Admin;


use App\Helper\SortDataHelper;
use App\Http\Requests\PageDescription\StorePageDescription;
use App\Http\Requests\Search\SearchRequest;
use App\Models\PageDescription;
use App\Repositories\PageDescriptionRepository;
use App\Repositories\PortfolioRepository;
use App\Services\MediaUploadService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageDescriptionController extends Controller
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

        $pageDescriptionList = PageDescriptionRepository::getPagination($validatedData);

        return view('panel.pageDescription.index', [
            'pageDescriptionList' => $pageDescriptionList,
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
        return view('panel.pageDescription.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePageDescription $request, MediaUploadService $mediaUploadService)
    {

        $validatedData = $request->validated();

        $pageDescriptionData = collect($validatedData)->except(['photo'])->toArray();

        if($request->photo){
            $pageDescriptionData['photo'] = $mediaUploadService->handle($request->photo)['link'];
        }

        $pageDescription = PageDescriptionRepository::createPageDescription($pageDescriptionData);

        if(!$pageDescription){
            abort(404);
        }

        return to_route('panel.pageDescription.edit', $pageDescription['id'])->with('success', 'Статья создана');
    }

    /**
     * Display the specified resource.
     */
    public function show(PageDescription $pageDescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pageDescriptionId = PageDescriptionRepository::getPageDescriptionById($id);

        if(!$pageDescriptionId){
            abort('404');
        }


        return view('panel.pageDescription.edit', [
            'pageDescription' => $pageDescriptionId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PageDescription $pageDescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, MediaUploadService $mediaDeleteService)
    {
        $pageDescription = PageDescriptionRepository::getPageDescriptionById($id);

        if(!$pageDescription){
            abort('404');
        }

        if($pageDescription['photo']){
            $mediaDeleteService->handle($pageDescription['photo']);
//
        }



        PageDescriptionRepository::deletePageDescription($id);
        return to_route('panel.pageDescriptionRepository')->with('success', 'Статья ' . "'" . $pageDescription['title'] . "'" . ' удалена');
    }
}
