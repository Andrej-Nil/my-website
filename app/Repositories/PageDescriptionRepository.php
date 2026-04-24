<?php

namespace App\Repositories;

use App\Models\PageDescription;

class PageDescriptionRepository
{
    public static function getPagination(array $data = [],  int $count = 20):array
    {
        if ($data) {
            if (isset($data['search'])) {
                return PageDescription::where('title', 'LIKE', '%' . $data['search'] . '%')->
                orderBy($data['sort']['key'], $data['sort']['type'])->
                paginate($count)->
                appends($data['params'])->
                toArray();
            } else {
                return PageDescription::orderBy($data['sort']['key'], $data['sort']['type'])->
                paginate($count)->
                appends($data['params'])->
                toArray();
            }
        }

        return PageDescription::paginate($count)->toArray();
    }




    public static function getPaginationByIsDisplay(int $isDisplay = 1, int $count = null){
        return PageDescription::where('is_display', $isDisplay)->
        orderBy('sort', 'ASC')->
        paginate($count)->
        toArray();
    }


    public static function getPageDescriptionByIsDisplay(int $isDisplay = 1){
        return PageDescription::where('is_display', $isDisplay)->
        orderBy('sort', 'ASC')->get()->toArray();
    }

    public static function createPageDescription(array $data):array{
        return PageDescription::create($data)->toArray();
    }

    public static function getPageDescriptionById(int $id):array{
        $item = PageDescription::find($id);
        return $item ? $item->toArray() : [];
    }

    public static function updatePageDescription(int $id, array $data):bool{
        return PageDescription::where('id', $id)->update($data);
    }

    public static function deletePageDescription(int $id):bool{
        return PageDescription::where('id', $id)->delete();
    }

    public static function updateSort($id, $sort){
        $result = PageDescription::where('id', $id);
        if($result){
            return $result->update(['sort' => $sort]);
        } else {
            return false;
        }
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
