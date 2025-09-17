<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Sort\UpdateSortRequest;
use App\Repositories\JobPlaceRepository;

class JobPlaceApiController extends BaseController
{
    public function updateSort(UpdateSortRequest $request){
        $data = $request->validated();
        if(!$data['id_list']){
            return $this->sendError('Нет данных');
        }

        foreach ($data['id_list'] as $key=>$id) {
            $result = JobPlaceRepository::updateSort($id, $key);
            if(!$result){
                return  $this->sendError('Ошибка');
            }
        }

        return $this->sendResponse([]);

    }
}
