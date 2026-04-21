<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\BaseController;
use App\Repositories\ActivityWithPostRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActivityWithPostApiController extends BaseController
{

    public function reaction(Request $request){

        $post = PostRepository::getPostById($request->post_id);

        if(!$post){
            return  $this->sendError('Поста удалена или не существует');
        }

        $cookieId = $request->cookie('user_cookie_id');
        $reaction = $request->reaction;

        if(!$cookieId){
            $cookieId = (string) Str::uuid();
        }

        $activityUser = ActivityWithPostRepository::getActivityWithPostByPostIdAndCookieId($post['id'], $cookieId);

        if($activityUser){
            if($reaction == 1){
                $reaction = $activityUser['reaction'] == 1 ? 0 : 1;
            } else if($reaction == 2) {
                $reaction = $activityUser['reaction'] == 2 ? 0 : 2;
            }

            ActivityWithPostRepository::updateActivityWithPost($post['id'], $cookieId, ['reaction' => $reaction]);
        } else {
            ActivityWithPostRepository::createActivityWithPost([
                'cookie_id' => $cookieId,
                'ip_address' => $request->ip(),
                'post_id' => $post['id'],
                'reaction' => $reaction,
                'viewing' => 1
            ]);
        }


        $activityPost = ActivityWithPostRepository::getActivityWithPostByPostId($post['id']);

        return $this->sendResponse([
                'user_reaction' => $reaction,
                'activityPost' => $activityPost
            ]
        )->cookie('user_cookie_id', $cookieId, 525600);
    }


//
//    public function like(Request $request){
//
//        $post = PostRepository::getPostById($request->post_id);
//
//        if(!$post){
//            return  $this->sendError('Поста удалена или не существует');
//        }
//
//        $cookieId = $request->cookie('user_cookie_id');
//
//        if(!$cookieId){
//            $cookieId = (string) Str::uuid();
//        }
//
//        $activityUser = ActivityWithPostRepository::getActivityWithPostByPostIdAndCookieId($post['id'], $cookieId);
//        $reaction = 1;
//        if($activityUser){
//
//            $reaction = $activityUser['reaction'] == 1 ? 0 : 1;
//
//            ActivityWithPostRepository::updateActivityWithPost($post['id'], $cookieId, ['reaction' => $reaction]);
//        } else {
//            ActivityWithPostRepository::createActivityWithPost([
//                'cookie_id' => $cookieId,
//                'ip_address' => $request->ip(),
//                'post_id' => $post['id'],
//                'reaction' => $reaction,
//                'viewing' => 1
//            ]);
//        }
//
//
//        $activityPost = ActivityWithPostRepository::getActivityWithPostByPostId($post['id']);
//
//        return $this->sendResponse([
//                'user_reaction' => $reaction,
//                'activityPost' => $activityPost
//            ]
//        )->cookie('user_cookie_id', $cookieId, 525600);
//    }

    public function dislike(Request $request){
        return ['you' => 'dislike'];
    }

}
