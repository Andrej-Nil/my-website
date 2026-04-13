<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Display\UpdateDisplayRequest;
use App\Http\Requests\Sort\UpdateSortRequest;
use App\Repositories\PostRepository;

class PostApiController extends BaseController
{

    public function updateSort(UpdateSortRequest $request){
        $data = $request->validated();
        if(!$data['id_list']){
            return $this->sendError('Нет данных');
        }

        foreach ($data['id_list'] as $key=>$id) {
            $result = PostRepository::updateSort($id, $key);
            if(!$result){
                return  $this->sendError('Ошибка');
            }
        }

        return $this->sendResponse([]);

    }

    public function updateDisplay(UpdateDisplayRequest $request) {

        $data = $request->validated();
        $Post = PostRepository::getPostById($data['id']);
        if(!$Post){
            return $this->sendError('Ошибка');
        }
        if($Post['is_display']) {
            $isDisplay = 0;
        } else {
            $isDisplay = 1;
        }
        PostRepository::updatePost($data['id'], ['is_display' => $isDisplay]);
        return $this->sendResponse(['isDisplay' => $isDisplay]);
    }
}
