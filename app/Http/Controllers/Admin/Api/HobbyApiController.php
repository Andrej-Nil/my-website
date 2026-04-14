<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Display\UpdateDisplayRequest;
use App\Http\Requests\Sort\UpdateSortRequest;
use App\Repositories\HobbyRepository;
use Illuminate\Http\Request;

class HobbyApiController extends BaseController
{
    public function update(Request $request){
        $data = $request->all();
        $id = $request->id;
        $hobby = HobbyRepository::getHobbyById($id);

        if(!$hobby){
            return  $this->sendError('Картинка удалена или не существует');
        }


        HobbyRepository::updateHobby($id, $data);

        return $this->sendResponse([]);
    }

    public function updateSort(UpdateSortRequest $request){
        $data = $request->validated();
        if(!$data['id_list']){
            return $this->sendError('Нет данных');
        }

        foreach ($data['id_list'] as $key=>$id) {
            $result = HobbyRepository::updateSort($id, $key);
            if(!$result){
                return  $this->sendError('Ошибка');
            }
        }

        return $this->sendResponse([]);

    }

    public function updateDisplay(UpdateDisplayRequest $request) {

        $data = $request->validated();
        $hobby = HobbyRepository::getHobbyById($data['id']);
        if(!$hobby){
            return $this->sendError('Ошибка');
        }
        if($hobby['is_display']) {
            $isDisplay = 0;
        } else {
            $isDisplay = 1;
        }
        HobbyRepository::updateHobby($data['id'], ['is_display' => $isDisplay]);
        return $this->sendResponse(['isDisplay' => $isDisplay]);
    }
}
