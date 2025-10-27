<?php
namespace App\Repositories;
use App\Models\Education;

class EducationRepository
{

    public static function getPagination(array $data = [], int $count = 20):array{
        return Education::limit($count)->orderBy('sort', 'ASC')->get()->toArray();
    }

    public static function getEducationByIdDisplayAndSort(){
        return Education::where(['is_display' => 1])->orderBy('sort', 'ASC')->get()->toArray();
    }

    public static function createEducation(array $data):array{
        return Education::create($data)->toArray();
    }

    public static function getEducationById(int $id):array{
        $item = Education::find($id);
        return $item ? $item->toArray() : [];
    }

    public static function updateEducation(int $id, array $data):bool{
        return Education::where('id', $id)->update($data);
    }

    public static function deleteEducation(int $id):bool{
        return Education::where('id', $id)->delete();
    }

    public static function updateSort($id, $sort){
        $result = Education::where('id', $id);
        if($result){
            return $result->update(['sort' => $sort]);
        } else {
            return false;
        }
    }


}
