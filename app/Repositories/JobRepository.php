<?php

namespace App\Repositories;

use App\Models\Job;

class JobRepository
{
    public static function getPagination(array $data = [], int $count = 20){
//        return Job::limit($count)->orderBy('sort', 'ASC')->get()->toArray();
        if(isset($data['search'])){
            return Job::where('title', 'LIKE', '%'.$data['search'].'%')->
            orderBy($data['sort']['key'], $data['sort']['type'])->
            paginate($count)->
            appends($data['params'])->
            toArray();
        }
        return Job::orderBy($data['sort']['key'], $data['sort']['type'])->paginate($count)->appends($data['params'])->toArray();
    }

    public static function createJob(array $data):array{
        return Job::create($data)->toArray();
    }

    public static function getJobById(int $id):array{
        $item = Job::find($id);
        return $item ? $item->toArray() : [];
    }

    public static function updateJob(int $id, array $data):bool{
        return Job::where('id', $id)->update($data);
    }


    public static function deleteJob(int $id):bool{
        return Job::where('id', $id)->delete();
    }

    public static function updateSort($id, $sort){
        $result = Job::where('id', $id);
        if($result){
            return $result->update(['sort' => $sort]);
        } else {
            return false;
        }
    }

}
