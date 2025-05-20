<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{


    protected $fillable = [
        'title',
        'photo_id',
        'link',
        'photo_list',
        'is_display',
    ];

    protected $casts = [
        'photo_list'=> 'array',
    ];

    public function photo(){
        return $this->hasOne(Image::class, 'id' ,'photo_id');
    }

    public function photo_list(){
        return $this->hasOne(Image::class, 'id' ,'photo_list');
    }
}
