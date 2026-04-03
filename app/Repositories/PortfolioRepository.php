<?php

namespace App\Repositories;

use App\Models\Portfolio;

class PortfolioRepository
{
    public static function getPagination(array $data = [], int $count = 20):array
    {
        if ($data) {
            if (isset($data['search'])) {
                return Portfolio::where('title', 'LIKE', '%' . $data['search'] . '%')->
                orderBy($data['sort']['key'], $data['sort']['type'])->
                paginate($count)->
                appends($data['params'])->
                toArray();
            } else {
                return Portfolio::orderBy($data['sort']['key'], $data['sort']['type'])->
                paginate($count)->
                appends($data['params'])->
                toArray();
            }
        }

        return Portfolio::paginate($count)->toArray();
    }

    public static function createPortfolio(array $data):array{
        return Portfolio::create($data)->toArray();
    }

    public static function getPortfolioById(int $id):array{
        $item = Portfolio::find($id);
        return $item ? $item->toArray() : [];
    }

    public static function updatePortfolio(int $id, array $data):bool{
        return Portfolio::where('id', $id)->update($data);
    }

    public static function deletePortfolio(int $id):bool{
        return Portfolio::where('id', $id)->delete();
    }

    public static function updateSort($id, $sort){
        $result = Portfolio::where('id', $id);
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
