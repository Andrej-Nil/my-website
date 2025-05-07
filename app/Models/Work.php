<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'title',
        'url',
        'photo_id',
        'text',
        'is_display'
    ];


    public function photo(){
        return $this->hasOne(Image::class, 'id' ,'photo_id');
    }

}
