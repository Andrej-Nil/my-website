<?php

namespace App\Http\Controllers;

use App\Repositories\ActivityWithPostRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserInfoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $userCookieId = $request->cookie('user_cookie_id');
        $admin = UserInfoRepository::getUserInfoByFirst();
        $postList = PostRepository::getPaginationByIsDisplay();

        foreach ($postList['data'] as $key => $post){
            $postList['data'][$key]['user_reaction'] = 0;
            foreach ($post['reactions'] as $reaction) {
                if($reaction['cookie_id'] === $userCookieId){
                    $postList['data'][$key]['user_reaction'] = $reaction['reaction'];
                }
            }
        }





//        foreach ($postList as $post) {
//            $allReactions = $post->reactions;
//        }

//        dd($allReactions);

//        $postList = Post::withCount([
//            'reactions as likes_count' => function ($query) {
//                $query->where('reaction', 1);
//            },
//            'reactions as dislikes_count' => function ($query) {
//                $query->where('reaction', 2);
//            },
//            'reactions as view_count' => function ($query) {
//        $query->where('reaction', 2);
//    }
//        ])->get();

//        dd($postList);
        return view('post.index', [
            'admin' => $admin,
            'postList' => $postList,
            'userCookieId' => $userCookieId
        ]);
    }

    public function show(Request $request, $id)
    {
        $admin = UserInfoRepository::getUserInfoByFirst();
        $post = PostRepository::getPostById($id);

        if(!$post){
            abort(404);
        }
//
        $cookieId = $request->cookie('user_cookie_id');
//
        if(!$cookieId){
            $cookieId = (string) Str::uuid();
        }


        $activityUser = ActivityWithPostRepository::getActivityWithPostByPostIdAndCookieId($id, $cookieId);

        if(!$activityUser){
            $activityUser = ActivityWithPostRepository::createActivityWithPost([
                'cookie_id' => $cookieId,
                'ip_address' => $request->ip(),
                'post_id' => $post['id'],
                'reaction' => 0,
                'viewing' => 1
            ]);
        }

//        $viewingCount = ActivityWithPostRepository::getActivityWithPostByViewingCount($post['id']);

//        $activityTotal = ActivityWithPostRepository::getActivityWithPostByPostId($post['id']);

//dd($activityTotal);

        return response()->view('post.show',[
            'admin' => $admin,
            'post' => $post,
            'reactionUser' => $activityUser['reaction'],
        ])->cookie('user_cookie_id', $cookieId, 525600);
    }


}
