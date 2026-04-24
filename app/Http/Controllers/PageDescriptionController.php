<?php

namespace App\Http\Controllers;

use App\Models\PageDescription;
use App\Repositories\PageDescriptionRepository;
use App\Repositories\UserInfoRepository;
use Illuminate\Http\Request;

class PageDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = UserInfoRepository::getUserInfoByFirst();
        $pageDescriptionList = PageDescriptionRepository::getPageDescriptionByIsDisplay();
        return view('pageDescription.index', [
                'admin' => $admin,
                'pageDescriptionList' => $pageDescriptionList
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        $admin = UserInfoRepository::getUserInfoByFirst();
        $pageDescription = PageDescriptionRepository::getPageDescriptionById($id);

        if(!$pageDescription){
            abort(404);
        }


        $pageDescriptionList = PageDescriptionRepository::getPageDescriptionByIsDisplay();

        return view('pageDescription.show',[
            'admin' => $admin,
            'pageDescription' => $pageDescription,
            'pageDescriptionList' => $pageDescriptionList
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PageDescription $pageDescription)
    {
        //
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
    public function destroy(PageDescription $pageDescription)
    {
        //
    }
}
