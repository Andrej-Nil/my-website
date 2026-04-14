<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public static function getPagination(array $data = [], int $count = 20):array{
//        return Job::limit($count)->orderBy('sort', 'ASC')->get()->toArray();
        if(isset($data['search'])){
            return Post::where('title', 'LIKE', '%'.$data['search'].'%')->
            orderBy($data['sort']['key'], $data['sort']['type'])->
            paginate($count)->
            appends($data['params'])->
            toArray();
        }
        return Post::orderBy($data['sort']['key'], $data['sort']['type'])->
        paginate($count)->
        appends($data['params'])->
        toArray();
    }

    public static function getPaginationByIsDisplay(int $isDisplay = 1, int $count = 20){
        return Post::where('is_display', $isDisplay)->
        orderBy('sort', 'ASC')->
        paginate($count)->
        toArray();
    }

    public static function createPost(array $data):array{
        return Post::create($data)->toArray();
    }

    public static function getPostById(int $id):array{
        $item = Post::find($id);
        return $item ? $item->toArray() : [];
    }

    public static function updatePost(int $id, array $data):bool{
        return Post::where('id', $id)->update($data);
    }


    public static function deletePost(int $id):bool{
        return Post::where('id', $id)->delete();
    }

    public static function updateSort($id, $sort){
        $result = Post::where('id', $id);
        if($result){
            return $result->update(['sort' => $sort]);
        } else {
            return false;
        }
    }

    public static function getPostByIdDisplayAndSort(){
        return Post::where(['is_display' => 1])->orderBy('sort', 'ASC')->get()->toArray();
    }


}
