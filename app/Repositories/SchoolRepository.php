<?php
namespace App\Repositories;
use App\Models\School;

class SchoolRepository
{

    public static function getPagination(array $data = [], int $count = 20):array{
        if(isset($data['search'])){
            return School::where('title', 'LIKE', '%'.$data['search'].'%')->
            orderBy($data['sort']['key'], $data['sort']['type'])->
            paginate($count)->
            appends($data['params'])->
            toArray();
        }
        return School::orderBy($data['sort']['key'], $data['sort']['type'])->
        paginate($count)->
        appends($data['params'])->
        toArray();
//        return School::limit($count)->orderBy('sort', 'ASC')->get()->toArray();
    }

    public static function getSchoolByIdDisplayAndSort(){
        return School::where(['is_display' => 1])->orderBy('sort', 'ASC')->get()->toArray();
    }

    public static function createSchool(array $data):array{
        return School::create($data)->toArray();
    }

    public static function getSchoolById(int $id):array{
        $item = School::find($id);
        return $item ? $item->toArray() : [];
    }

    public static function updateSchool(int $id, array $data):bool{
        return School::where('id', $id)->update($data);
    }

    public static function deleteSchool(int $id):bool{
        return School::where('id', $id)->delete();
    }

    public static function updateSort($id, $sort){
        $result = School::where('id', $id);
        if($result){
            return $result->update(['sort' => $sort]);
        } else {
            return false;
        }
    }
}
