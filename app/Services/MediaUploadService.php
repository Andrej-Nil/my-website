<?php

namespace App\Services;

use App\Helper\ExtensionHelper;
use App\Http\Controllers\BaseController;
use App\Models\Media;
use App\Repositories\MediaRepository;
use Illuminate\Http\UploadedFile;

class MediaUploadService extends BaseController {


    public function handle($file){

        if(is_null($file)) {
            return  $this->sendError('Файл не выбран');
        }
//        $links = '';

//        foreach ($files as $key=>$file) {

//            if($file instanceof UploadedFile) {
                //  $extension = $file->getClientOriginalExtension();
                $extension = $file->getClientOriginalExtension();
                $type = ExtensionHelper::getType($extension);
                if($type){
                    $fileName = uniqid() . '_' . time() . '.' . $extension;
                    $filePath = '/photo/media/' . date('Y') . '/' . date('m');
                    $path = $file->storeAs($filePath, $fileName, 'public');

                    return MediaRepository::createMedia([
                        'link' => $path,
                        'type' => $type,
                    ]);

//                    if( $key === 0){
//                        $links = $path;
//                    } else {
//                        $links = $links . ',' . $path;
//                    }

                } else {
                    return  $this->sendError('Призошла ошибка', 404);
                }

//            }
//        }


    }

}
