<?php

namespace App\Models;


use App\Repositories\ImageRepository;
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

    protected $appends = [
        'img_list'
    ];

    public function photo(){
        return $this->hasOne(Image::class, 'id' ,'photo_id');
    }
    public function getImgListAttribute(){
        return ImageRepository::getImgById($this->photo_list);
    }
}
