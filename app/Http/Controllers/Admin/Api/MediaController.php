<?php

namespace App\Http\Controllers\Admin\Api;


use App\Helper\ExtensionHelper;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Media\StoreMediaRequest;
use App\Repositories\ImageRepository;
use App\Repositories\MediaRepository;
use App\Services\MediaDeleteService;
use App\Services\MediaUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MediaController extends BaseController
{
    public function store(StoreMediaRequest $request, MediaUploadService $mediaUploadService) {

        $file = $request->file('media');

        if(!$file) {
            return $this->sendError('Файл не выбран');
        }
//        $test = 'test';
//        $jpeg = 'jpeg';
        //dd($request->validated());
        //$type = $extensionHelper->getType($test);
        $data = $request->validated();
//        dd($data);
        $item = $mediaUploadService->handle($request->file('media'));
        return $this->sendResponse(['media'=>$item]);
    }

    public function destroy(Request $request, MediaDeleteService $mediaDeleteService)
    {

        $rez = $mediaDeleteService->handle($request->link);

        if($rez['success']){
            return $this->sendResponse(['message' => 'Картинка удалена']);
        } else {
            return $this->sendError($rez['message']);
        }

    }

//    public function photo(Request $request){
//        $file = $request->file('file');
//        if(!$file) {
//            return $this->sendError('Файл не выбран');
//        }
//
//        $extension = $file->getClientOriginalExtension();
//
//        if(!MediaUploadService::isExtensionPhoto($extension)){
//            return $this->sendError('Выбран не тот формат');
//        }
//
//        $size = $file->getSize();
//
//        if($size > 3145728) {
//            return $this->sendError('Размер файла превышает 3 мб');
//        }
//
//        $path = $file->store('photo', 'public');
//        if(!$path){
//            return $this->sendError('Произошла ошибка');
//        }
//        //$image = ImageRepository::createImage($path);
//        return $this->sendResponse([ 'url' =>  $path]);
//    }
}
