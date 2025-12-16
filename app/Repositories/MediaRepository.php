<?php

namespace App\Repositories;


use App\Models\Media;

class MediaRepository
{
    public static function getPagination(array $data = [], int $count = 20):array{

//        if(isset($data['search'])){
//            return Hobby::with('photo')->where('title', 'LIKE', '%'.$data['search'].'%')->limit($count)->get()->toArray();
//        }
//        return Hobby::with('photo')->limit($count)->orderBy('id', 'DESC')->get()->toArray();
        return Media::orderBy('id', 'DESC')->get()->toArray();
    }

    public static function createMedia(array $data):array{
        return Media::create($data)->toArray();
    }

    public static function getByMediaId(int $id):array{

        $item = Media::find($id);

        return $item ? $item->toArray() : [];

    }

    public static function getMediaByLink(string $link):array{

        $item = Media::where('link', $link)->first();
        return $item ? $item->toArray() : [];

    }




//    public static function updateHobby(int $id, array $data):bool{
//        return Hobby::where('id', $id)->update($data);
//    }

    public static function deleteMedia(int $id):bool{
        return Media::where('id', $id)->delete();
    }

//    public static function deleteMediaByLink(int $link):bool{
//        return Media::where('link', $link)->delete();
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
