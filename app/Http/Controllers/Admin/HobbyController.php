<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hobby\StoreHobbyRequest;
use App\Http\Requests\Hobby\UpdateHobbyRequest;
use App\Repositories\HobbyRepository;
use App\Repositories\ImageRepository;
use App\Services\MediaUploadService;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hobbyList = HobbyRepository::getPagination();
//        dd($hobbyList);
        return view('panel.hobby.index', ['hobbyList' => $hobbyList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.hobby.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHobbyRequest $request)
    {
        $hobby = HobbyRepository::createHobby($request->validated());
        if(!$hobby){
            abort(404);
        }
        return to_route('panel.hobbies.edit', $hobby['id'])->with('success', 'Хобби добавленно');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hobby $hobby)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hobby = HobbyRepository::getHobbyById($id);
//        @dd($hobby);
        if(!$hobby){
            abort('404');
        }



        return view('panel.hobby.edit', [
            'hobby' => $hobby,
            ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHobbyRequest $request, $id)
    {
        $hobby = HobbyRepository::getHobbyById($id);

        if(!$hobby){
            abort('404');
        }

        HobbyRepository::updateHobby($id, $request->validated());
        return to_route('panel.hobbies.edit', $hobby['id'])->with('success', 'Изменение сохронены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($link)
    {
//        $hobby = HobbyRepository::getHobbyById($id);
        $hobby = HobbyRepository::getHobbyByLink($link);

        if(!$hobby){
            abort('404');
        }

        HobbyRepository::deleteHobby($link);
        return to_route('panel.hobbies')->with('success', 'Хобби ' . "'" . $hobby['title'] . "'" . ' удалено');
    }
}
