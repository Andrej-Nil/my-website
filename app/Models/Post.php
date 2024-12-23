<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
//    protected $appends = ['date', 'img'];

    protected $fillable = [
        'title',
        'photo',
        'text',
        'display'

    ];

//    protected $casts = [
//        'photo'=> 'array'
//    ];
//
//    public function getDateAttribute(){
//        return $this->created_at->format('d.m.Y');
//    }
//
//    public function getImgAttribute(){
//        if($this->photo){
//            return $this->photo[0];
//        }
//        return asset('img/no-photo.jpg');
//    }
}
