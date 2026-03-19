<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Display\UpdateDisplayRequest;
use App\Http\Requests\Sort\UpdateSortRequest;
use App\Repositories\QualityRepository;

class QualityApiController extends BaseController
{

    public function updateSort(UpdateSortRequest $request){
        $data = $request->validated();
        if(!$data['id_list']){
            return $this->sendError('Нет данных');
        }

        foreach ($data['id_list'] as $key=>$id) {
            $result = SchoolRepository::updateSort($id, $key);
            if(!$result){
                return  $this->sendError('Ошибка');
            }
        }

        return $this->sendResponse([]);

    }

    public function updateDisplay(UpdateDisplayRequest $request) {

        $data = $request->validated();
        $quality = QualityRepository::getQualityById($data['id']);
        if(!$quality){
            return $this->sendError('Ошибка');
        }
        if($quality['is_display']) {
            $isDisplay = 0;
        } else {
            $isDisplay = 1;
        }
        QualityRepository::updateQuality($data['id'], ['is_display' => $isDisplay]);
        return $this->sendResponse(['isDisplay' => $isDisplay]);
    }
}
