<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
//    protected $appends = ['date', 'img'];

    protected $fillable = [
        'title',
        'photo_id',
        'text',
        'display'

    ];



    public function photo(){
        return $this->hasOne(Image::class, 'id' ,'photo_id');
    }

//    protected $casts = [
//        'photo'=> 'array'
//    ];
//
//    public function getDateAttribute(){
//        return $this->created_at->format('d.m.Y');
//    }
//
//    public function getUrlAttribute(){
//        return asset('img/no-photo.jpg');
//    }
}
