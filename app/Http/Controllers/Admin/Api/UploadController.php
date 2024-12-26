<?php

namespace App\Http\Controllers\Admin\Api;


use App\Repositories\ImageRepository;
use App\Services\UploadService;
use Illuminate\Http\Request;


class UploadController extends BaseController
{
    public function photo(Request $request){
        $file = $request->file('file');
        if(!$file) {
            return $this->sendError('Файл не выбран');
        }

        $extension = $file->getClientOriginalExtension();

        if(!UploadService::isExtensionPhoto($extension)){
            return $this->sendError('Выбран не тот формат');
        }

        $size = $file->getSize();

        if($size > 3145728) {
            return $this->sendError('Размер файла превышает 3 мб');
        }

        $path = $file->store('photo', 'public');
        if(!$path){
            return $this->sendError('Произошла ошибка');
        }

        $image = ImageRepository::createImage("/storage/$path");
        return $this->sendResponse([ 'photo' =>  $image]);

    }


}
