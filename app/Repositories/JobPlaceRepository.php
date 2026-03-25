<?php
namespace App\Repositories;
use App\Models\JobPlace;

class JobPlaceRepository
{

    public static function getPagination(array $data = [], int $count = 20):array{

        return JobPlace::limit($count)->orderBy('sort', 'ASC')->get()->toArray();
    }

    public static function getJobPlaceByIdDisplayAndSort(){
        return JobPlace::where(['is_display' => 1])->orderBy('sort', 'ASC')->get()->toArray();
    }


    public static function createJobPlace(array $data):array{
        return JobPlace::create($data)->toArray();
    }

    public static function getJobPlaceById(int $id):array{
        $item = JobPlace::find($id);
        return $item ? $item->toArray() : [];
    }

    public static function updateJobPlace(int $id, array $data):bool{
        return JobPlace::where('id', $id)->update($data);
    }
    public static function deleteJobPlace(int $id):bool{
        return JobPlace::where('id', $id)->delete();
    }

    public static function updateSort($id, $sort){
        $result = JobPlace::where('id', $id);
        if($result){
            return $result->update(['sort' => $sort]);
        } else {
            return false;
        }
    }


}
