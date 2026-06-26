<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\BaseController;
use App\Http\Requests\Callback\CallbackRequest;
use App\Mail\CallbackMail;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class CallbackController extends BaseController
{

    public function callback(CallbackRequest $request){
        return $this->sendResponse([
            'message' =>  'Ваше письмо отправленно.<br/> В скором времени я с вами свяжусь'
        ]);
        $key = 'contact-form:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 1)) {
            $secondsLeft = RateLimiter::availableIn($key);
            $timeLeft = CarbonInterval::seconds($secondsLeft)->cascade()->forHumans(['short' => true]);

            return  $this->sendError(
                "С этого IP уже было отправлено сообщение. Попробуйте снова через {$timeLeft}.",
                [],
                429
            );

        }

        RateLimiter::hit($key, 86400);
        Mail::to('and.kucheroff@yandex.ru')->send(new CallbackMail($request->validated()));
        return $this->sendResponse([
            'message' =>  'Ваше письмо отправленно.<br/> В скором времени я с вами свяжусь'
        ]);

    }

}
