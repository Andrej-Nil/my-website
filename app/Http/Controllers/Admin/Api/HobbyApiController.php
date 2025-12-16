<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\BaseController;
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
}
