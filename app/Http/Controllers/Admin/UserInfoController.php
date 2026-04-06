<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserInfo\StoreUserInfoRequest;
use App\Http\Requests\UserInfo\UpdateUserInfoRequest;
use App\Models\UserInfo;
use App\Repositories\UserInfoRepository;
use App\Services\MediaDeleteService;
use App\Services\MediaUploadService;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $userInfo = UserInfoRepository::getUserInfoByFirst();
        if($userInfo){
            return to_route('panel.userInfos.edit', $userInfo['id']);
        }
        return (view('panel.userInfo.create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserInfoRequest $request, MediaUploadService $mediaUploadService)
    {

        $validatedData = $request->validated();

        $infoData = collect($validatedData)->except(['photo'])->toArray();

        if($request->photo){
            $infoData['photo'] = $mediaUploadService->handle($request->photo)['link'];
        }

        $userInfo = UserInfoRepository::createUserInfo($infoData);

        if(!$userInfo){
            abort(404);
        }

        return to_route('panel.userInfos.edit', $userInfo['id'])->with('success', 'Данные добавлены');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserInfo $userInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $userInfo = UserInfoRepository::getUserInfoById($id);

        if(!$userInfo){
            abort('404');
        }
        $userInfo['year_birth'] = explode(' ',$userInfo['year_birth'])[0];
        return view('panel.userInfo.edit', [
            'userInfo' => $userInfo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserInfoRequest $request, $id)
    {

        $userInfo = UserInfoRepository::getUserInfoById($id);

        if(!$userInfo){
            abort('404');
        }

        UserInfoRepository::updateUserInfo($id, $request->validated());

        return to_route('panel.userInfos.edit', $userInfo['id'])->with('success', 'Данные обновлены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, MediaDeleteService $mediaDeleteService)
    {

        $userInfo = UserInfoRepository::getUserInfoById($id);

        if(!$userInfo){
            abort('404');
        }

        if($userInfo['photo']){
            $mediaDeleteService->handle($userInfo['photo']);
        }

        UserInfoRepository::deleteUserInfo($id);

        return to_route('panel')->with('success', 'Данные удалены');
    }

//    public function clear(UserInfo $userInfo)
//    {
//        //
//    }
}
