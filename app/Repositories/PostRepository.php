<?php
namespace App\Repositories;
use App\Models\Post;

class PostRepository
{

    public static function getPagination(array $data = [], int $count = 20):array{

        if(isset($data['search'])){
           return Post::where('title', 'LIKE', '%'.$data['search'].'%')->limit($count)->get()->toArray();
        }
        return Post::limit($count)->orderBy('id', 'DESC')->get()->toArray();
    }

    public static function createPost(array $data):array{
        return Post::create($data)->toArray();
    }

    public static function getPostById(int $id):array{
        $item = Post::with('photo')->find($id);
        return $item ? $item->toArray() : [];
    }


    public static function updatePost(int $id, array $data):bool{
        return Post::where('id', $id)->update($data);
    }
    public static function deletePost(int $id):bool{
        return Post::where('id', $id)->delete();
    }
//    public static function getArticleById(int $id):array{
//        $item = Article::find($id);
//        return $item ? $item->toArray() : [];
//    }
//    public static function getArticleBySlug(string $slug):array{
//        $item = Article::where( 'slug', $slug)->first();
//        return $item ? $item->toArray() : [];
//    }
}
