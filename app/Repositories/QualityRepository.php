<?php

namespace App\Repositories;

use App\Models\Quality;

class QualityRepository
{

    public static function getPagination(array $data = [], int $count = 20):array{
        if(isset($data['search'])){
            return Quality::where('title', 'LIKE', '%'.$data['search'].'%')->
            orderBy($data['sort']['key'], $data['sort']['type'])->
            paginate($count)->
            appends($data['params'])->
            toArray();
        }
        return Quality::orderBy($data['sort']['key'], $data['sort']['type'])->
        paginate($count)->
        appends($data['params'])->
        toArray();
    }

    public static function createQuality($data):array{
        return Quality::create($data)->toArray();
    }

    public static function getQualityById(int $id):array{
        $item = Quality::find($id);
        return $item ? $item->toArray() : [];
    }
//    public static function getPagination(int $count = 20):array{
//        return Article::limit($count)->orderBy('id', 'DESC')->get()->toArray();
//    }

    public static function updateQuality(int $id, array $data):bool{
        return Quality::where('id', $id)->update($data);
    }
//    public static function deleteContact(int $id):bool{
//        return Contact::where('id', $id)->delete();
//    }
//    public static function getArticleById(int $id):array{
//        $item = Article::find($id);
//        return $item ? $item->toArray() : [];
//    }
//    public static function getArticleBySlug(string $slug):array{
//        $item = Article::where( 'slug', $slug)->first();
//        return $item ? $item->toArray() : [];
//    }
//}
}
