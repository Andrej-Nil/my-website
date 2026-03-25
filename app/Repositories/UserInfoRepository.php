<?php

namespace App\Repositories;

use App\Models\UserInfo;

class UserInfoRepository
{
//    public static function getPagination(array $data = [], int $count = 20):array{
//
//        if(isset($data['search'])){
//            return Hobby::where('title', 'LIKE', '%'.$data['search'].'%')->
//            orderBy($data['sort']['key'], $data['sort']['type'])->
//            paginate($count)->
//            appends($data['params'])->
//            toArray();
//        }
//
//
//        return Hobby::orderBy($data['sort']['key'], $data['sort']['type'])->
//        paginate($count)->
//        appends($data['params'])->
//        toArray();
//
//    }


    public static function getUserInfoByFirst():array{
        return UserInfo::first()->toArray();
    }

    public static function createUserInfo(array $data):array{
        return UserInfo::create($data)->toArray();
    }

    public static function getUserInfoById(int $id):array{
        $item = UserInfo::find($id);
        return $item ? $item->toArray() : [];
    }

    public static function updateUserInfo(int $id, array $data):bool{
        return UserInfo::where('id', $id)->update($data);
    }

    public static function deleteUserInfo(int $id):bool{
        return UserInfo::where('id', $id)->delete();
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
