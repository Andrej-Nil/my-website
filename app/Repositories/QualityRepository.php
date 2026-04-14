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


    public static function getQualityByIsDisplay(){
        return Quality::where('is_display', 1)->
            orderBy('sort', 'ASC')->
            get()->
            toArray();
    }

//    public static function getPagination(int $count = 20):array{
//        return Article::limit($count)->orderBy('id', 'DESC')->get()->toArray();
//    }

    public static function updateQuality(int $id, array $data):bool{
        return Quality::where('id', $id)->update($data);
    }

    public static function updateSort($id, $sort){
        $result = Quality::where('id', $id);
        if($result){
            return $result->update(['sort' => $sort]);
        } else {
            return false;
        }
    }
    public static function deleteQuality(int $id):bool{
        return Quality::where('id', $id)->delete();
    }
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
