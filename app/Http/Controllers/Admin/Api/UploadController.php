<?php

namespace App\Http\Controllers\Admin\Api;


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

        $fileName = uniqid() . '_' . uniqid() . '_' . date('Y_m_d_H_i_s');
        return $this->sendResponse([ 'url' => $fileName]);
    }

//            $file->move(public_path() . '/uploads','filename.img');
//return $this->sendResponse([ 'url' => $url]);
}
