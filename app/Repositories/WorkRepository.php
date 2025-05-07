<?php
namespace App\Repositories;
use App\Models\Work;

class WorkRepository
{

    public static function getAll(){
        return Work::with('photo')->get()->toArray();
    }

    public static function getWorkByDisplay(){
        return Work::where('is_display', 1)->with('photo')->get()->toArray();
    }
    public static function getPagination(array $data = [], $count = 20):array{

        if(isset($data['search'])){
            return Work::with('photo')->where('title', 'LIKE', '%'.$data['search'].'%')->limit($count)->get()->toArray();
        }
        return Work::with('photo')->limit($count)->orderBy('id', 'DESC')->get()->toArray();
    }

    public static function createWork(array $data):array{
        return Work::create($data)->toArray();
    }
    public static function getWorkById(int $id):array{
        $item = Work::with('photo')->find($id);
        return $item ? $item->toArray() : [];
    }

    public static function updateWork(int $id, array $data):bool{
        return Work::where('id', $id)->update($data);
    }
    public static function deleteWork(int $id):bool{
        return Work::where('id', $id)->delete();
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
