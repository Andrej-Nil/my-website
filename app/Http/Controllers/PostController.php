<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\PostRepository;
use App\Repositories\UserInfoRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = UserInfoRepository::getUserInfoByFirst();
        $postList = PostRepository::getPaginationByIsDisplay();
        return view('post.index', [
            'admin' => $admin,
            'postList' => $postList,
        ]);
    }

    public function show($id)
    {
        $admin = UserInfoRepository::getUserInfoByFirst();
        $post = PostRepository::getPostById($id);

        if(!$post){
            abort(404);
        }
        return view('post.show', [
                'admin' => $admin,
                'post' => $post
            ]
        );
    }


}
