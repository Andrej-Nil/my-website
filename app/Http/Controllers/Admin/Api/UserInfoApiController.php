<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\BaseController;
use App\Models\UserInfo;
use App\Repositories\UserInfoRepository;
use Illuminate\Http\Request;

class UserInfoApiController extends BaseController
{
    public function update(Request $request){
        $data = $request->all();
        $id = $request->id;
        $userInfo = UserInfoRepository::getUserInfoById($id);

        if(!$userInfo){
            return  $this->sendError('Картинка удалена или не существует');
        }


        UserInfoRepository::updateUserInfo($id, $data);

        return $this->sendResponse([]);
    }
}
