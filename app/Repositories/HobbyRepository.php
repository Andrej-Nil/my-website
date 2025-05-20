<?php

namespace App\Repositories;

use App\Models\Hobby;

class HobbyRepository
{
    public static function getPagination(array $data = [], int $count = 20):array{

        if(isset($data['search'])){
            return Hobby::with('photo')->where('title', 'LIKE', '%'.$data['search'].'%')->limit($count)->get()->toArray();
        }
        return Hobby::with('photo')->limit($count)->orderBy('id', 'DESC')->get()->toArray();
    }


    public static function createHobby(array $data):array{
        return Hobby::create($data)->toArray();
    }

    public static function getHobbyById(int $id):array{
        $item = Hobby::with('photo')->find($id);
        return $item ? $item->toArray() : [];
    }

    public static function updateHobby(int $id, array $data):bool{
        return Hobby::where('id', $id)->update($data);
    }
    public static function deleteHobby(int $id):bool{
        return Hobby::where('id', $id)->delete();
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
