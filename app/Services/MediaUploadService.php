<?php

namespace App\Services;

use App\Helper\ExtensionHelper;
use App\Http\Controllers\BaseController;
use App\Models\Media;
use App\Repositories\MediaRepository;
use Illuminate\Http\UploadedFile;

class MediaUploadService extends BaseController {

    public function handle($file)
    {
        if (is_null($file)) {
            return $this->sendError('Файл не выбран');
        }
        if (is_array($file)) {
            $fileList = [];
            $link =[];
            foreach ($file as $key => $item) {
                $extension = $item->getClientOriginalExtension();
                $type = ExtensionHelper::getType($extension);
                if ($type) {
                    $fileName = uniqid() . '_' . time() . '.' . $extension;
                    $filePath = '/photo/media/' . date('Y') . '/' . date('m');
                    $path = $item->storeAs($filePath, $fileName, 'public');
                    $fileList[] = MediaRepository::createMedia([
                        'link' => $path,
                        'type' => $type,
                    ]);
                    $link[] = $path;
//                    if($key + 1 == count($file)){
//                        $link = $link . $path;
//                    } else {
//                        $link = $link . $path . ',' ;
//
//                    }

                }
            }
            return ['fileList' => $fileList, 'link' => $link];
        } else {
            $extension = $file->getClientOriginalExtension();
            $type = ExtensionHelper::getType($extension);
            if ($type) {
                $fileName = uniqid() . '_' . time() . '.' . $extension;
                $filePath = '/photo/media/' . date('Y') . '/' . date('m');
                $path = $file->storeAs($filePath, $fileName, 'public');

                return MediaRepository::createMedia([
                    'link' => $path,
                    'type' => $type,
                ]);

            } else {
                return $this->sendError('Призошла ошибка', 404);
            }
        }
    }
    public function getUrl() {

    }

}
