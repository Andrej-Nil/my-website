<?php
namespace App\Repositories;
use App\Models\Post;

class PostRepository
{

    public static function getPagination(int $count = 20):array{
        return Post::with('photo')->limit($count)->orderBy('id', 'DESC')->get()->toArray();
    }

    public static function createPost(array $data):array{
        return Post::create($data)->toArray();
    }

    public static function getPostById(int $id):array{
        $item = Post::with('photo')->find($id);
        return $item ? $item->toArray() : [];
    }


//    public static function updateArticle(int $id, array $data):bool{
//        return Article::where('id', $id)->update($data);
//    }
//    public static function deleteArticle(int $id):bool{
//        return Article::where('id', $id)->delete();
//    }
//    public static function getArticleById(int $id):array{
//        $item = Article::find($id);
//        return $item ? $item->toArray() : [];
//    }
//    public static function getArticleBySlug(string $slug):array{
//        $item = Article::where( 'slug', $slug)->first();
//        return $item ? $item->toArray() : [];
//    }
}
