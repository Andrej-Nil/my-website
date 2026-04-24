<?php

namespace App\Http\Controllers\Admin;

use App\Helper\SortDataHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio\StorePortfolioRequest;
use App\Http\Requests\Portfolio\UpdatePortfolioRequest;
use App\Http\Requests\Search\SearchRequest;
use App\Models\Portfolio;
use App\Repositories\PortfolioRepository;
use App\Services\MediaUploadService;
use Illuminate\Http\Request;

class PortfolioController extends Controller
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

        $portfolioList = PortfolioRepository::getPagination($validatedData);

        return view('panel.portfolio.index', [
            'portfolioList' => $portfolioList,
            'search' => $search,
            'data' => $validatedData,
            'currentSortTitle' => $validatedData['sort']['label']
        ]);


//        return view('panel.portfolio.index', ['portfolioList' => $portfolioList, 'search' => $search]);
//        $portfolioList['data'] = [];

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePortfolioRequest $request, MediaUploadService $mediaUploadService)
    {

        $validatedData = $request->validated();

        $portfolioData = collect($validatedData)->except(['photo'])->toArray();

        if($request->photo){
            $portfolioData['photo'] = $mediaUploadService->handle($request->photo)['link'];
        }

        $portfolio = PortfolioRepository::createPortfolio($portfolioData);

        if(!$portfolio){
            abort(404);
        }

        return to_route('panel.portfolios.edit', $portfolio['id'])->with('success', 'Данные добавлены');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $portfolio = PortfolioRepository::getPortfolioById($id);

        if(!$portfolio){
            abort('404');
        }


       return view('panel.portfolio.edit', [
        'portfolio' => $portfolio,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortfolioRequest $request, $id)
    {
        $portfolio = PortfolioRepository::getPortfolioById($id);

        if(!$portfolio){
            abort('404');
        }

        PortfolioRepository::updatePortfolio($id, $request->validated());
        return to_route('panel.portfolios.edit', $portfolio['id'])->with('success', 'Изменение сохронены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, MediaUploadService $mediaDeleteService)
    {
        $portfolio = PortfolioRepository::getPortfolioById($id);

        if(!$portfolio){
            abort('404');
        }

        if($portfolio['photo']){
            $mediaDeleteService->handle($portfolio['photo']);

//            $media = MediaRepository::getMediaByLink($hobby['main_photo']);
//            dd($media);
//            MediaRepository::deleteMediaByLink($hobby['main_photo']);
//
        }



        PortfolioRepository::deletePortfolio($id);
        return to_route('panel.portfolio')->with('success', 'Хобби ' . "'" . $portfolio['title'] . "'" . ' удалено');
    }
}
