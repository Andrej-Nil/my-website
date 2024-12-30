<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $appends = ['url'];

    protected $fillable = [
        'link'
    ];

    public function getUrlAttribute(){
        return  asset('/storage/' . $this->link);
    }
}
