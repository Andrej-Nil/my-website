<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\BaseController;
use App\Http\Requests\Callback\CallbackRequest;

class CallbackController extends BaseController
{
    public function callback(CallbackRequest $request){
     $request->validated();

        return $this->sendResponse([
            'message' =>  'Ваше письмо отправленно.<br/> В скором времени я с вами свяжусь'
        ]);
//     dd($validated);
//        $validatedData = $request->validate([
//            'number' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/|','min:9', 'min:15'],
//        ]);


    }

}
