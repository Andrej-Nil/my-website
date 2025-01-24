<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'title',
        'photo_id',
        'link',
        'display',
        'is_display'

    ];

    public function photo(){
        return $this->hasOne(Image::class, 'id' ,'photo_id');
    }

}
