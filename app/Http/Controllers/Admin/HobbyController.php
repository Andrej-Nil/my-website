<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hobby\StoreHobbyRequest;
use App\Http\Requests\Hobby\UpdateHobbyRequest;
use App\Repositories\HobbyRepository;
use App\Repositories\ImageRepository;
use App\Repositories\MediaRepository;
use App\Services\MediaDeleteService;
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
    public function store(StoreHobbyRequest $request, MediaUploadService $mediaUploadService)
    {

        $validatedData = $request->validated();
//        $hobby = HobbyRepository::createHobby($request->validated());
        $hobbyData = collect($validatedData)->except(['main_photo', 'bg_photo', 'mini_photo', 'photo_list'])->toArray();

        if($request->main_photo){
            $hobbyData['main_photo'] = $mediaUploadService->handle($request->main_photo)['link'];
        }
        if($request->bg_photo){
            $hobbyData['bg_photo'] = $mediaUploadService->handle($request->bg_photo)['link'];
        }
        if($request->mini_photo){
            $hobbyData['mini_photo'] = $mediaUploadService->handle($request->mini_photo)['link'];
        }
        if($request->photo_list){
            $hobbyData['photo_list'] = $mediaUploadService->handle($request->photo_list)['link'];
        }
//        $hobbyData['bg_photo'] = $mediaUploadService->handle($request->bg_photo)['link'];
//        $hobbyData['mini_photo'] = $mediaUploadService->handle($validatedData['mini_photo'])['link'];
        $hobby = HobbyRepository::createHobby($hobbyData);
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
    public function destroy($id, MediaDeleteService $mediaDeleteService)
    {

        $hobby = HobbyRepository::getHobbyById($id);

        if(!$hobby){
            abort('404');
        }

        if($hobby['main_photo']){
            $mediaDeleteService->handle($hobby['main_photo']);

//            $media = MediaRepository::getMediaByLink($hobby['main_photo']);
//            dd($media);
//            MediaRepository::deleteMediaByLink($hobby['main_photo']);
//
        }

        if($hobby['bg_photo']){
            MediaRepository::deleteMediaByLink($hobby['bg_photo']);
        }

        if($hobby['mini_photo']){
            MediaRepository::deleteMediaByLink($hobby['mini_photo']);
        }
        if($hobby['photo_list']){
            foreach ($hobby['photo_list'] as $photo){
                MediaRepository::deleteMediaByLink($photo);
            }
        }

        HobbyRepository::deleteHobby($id);
        return to_route('panel.hobbies')->with('success', 'Хобби ' . "'" . $hobby['title'] . "'" . ' удалено');
    }
}
