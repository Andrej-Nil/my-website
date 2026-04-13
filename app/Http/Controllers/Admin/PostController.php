<?php

namespace App\Http\Controllers\Admin;

use App\Helper\SortDataHelper;
use App\Http\Requests\post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Requests\Search\SearchRequest;
use App\Models\Post;
use App\Repositories\PostRepository;
use App\Services\MediaDeleteService;
use App\Services\MediaUploadService;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request)
    {

        $validatedData = $request->validated();
        $data = $request->all();
        $search = '';
        $validatedData['params'] = [];
        if(isset($validatedData['search'])){
            $search = $validatedData['search'];
        }
        if(isset($data['sort'])){
            $validatedData['sort'] = SortDataHelper::handle($data['sort']);
        } else {
            $validatedData['sort'] = ['key' => 'sort', 'type' => 'ASC', 'label' => 'По умолчанию', 'name' => null];
        }

        if($validatedData['sort']['name']){
            $validatedData['params']['sort'] = $validatedData['sort']['name'];
        }

        if(isset($validatedData['search'])) {
            $validatedData['params']['search'] = $validatedData['search'];
        }


        $postList = PostRepository::getPagination($validatedData);
        return view('panel.post.index',
            [
                'postList' => $postList,
                'search' => $search,
                'data' => $validatedData,
                'currentSortTitle' => $validatedData['sort']['label']
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, MediaUploadService $mediaUploadService)
    {
        $validatedData = $request->validated();
//        $hobby = HobbyRepository::createHobby($request->validated());
        $postData = collect($validatedData)->except(['photo_list'])->toArray();

        if($request->photo_list){
            $postData['photo_list'] = $mediaUploadService->handle($request->photo_list)['link'];
        }

        $post = PostRepository::createPost($postData);
        if(!$post){
            abort(404);
        }

        return to_route('panel.posts.edit', $post['id'])->with('success', 'Пост создан');
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
    public function edit($id)
    {
        $post = PostRepository::getPostById($id);

        if(!$post){
            abort('404');
        }

        return view('panel.post.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, $id)
    {

        $post = PostRepository::getPostById($id);

        if(!$post){
            abort('404');
        }

        PostRepository::updatePost($id, $request->validated());

        return to_route('panel.posts.edit', $post['id'])->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, MediaDeleteService $mediaDeleteService)
    {
        $post = PostRepository::getPostById($id);

        if(!$post){
            abort('404');
        }

        if($post['photo_list']){
            foreach ($post['photo_list'] as $photo){
                $mediaDeleteService->handle($photo);
            }
        }

        PostRepository::deletePost($id);
        return to_route('panel.posts')->with('success', 'Пост ' . "'" . $post['title'] . "'" . ' удален');
    }
}
