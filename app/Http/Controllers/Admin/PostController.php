<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;
use App\Repositories\ImageRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postList = PostRepository::getPagination();

        return  view('panel.post.index', ['postList' => $postList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('panel.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        $post = PostRepository::createPost($request->validated());
        return to_route('panel.posts.edit', $post['id'])->with('success', 'Статья создана');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($postId)
    {
        $post = PostRepository::getPostById($postId);
        if(!$post){
            abort(404);
        }

        return  view('panel.post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($postId)
    {
       dd($postId);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
