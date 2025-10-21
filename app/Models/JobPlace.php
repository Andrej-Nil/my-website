<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPlace extends Model
{
    protected $fillable = [
        'title',
        'profession',
        'start',
        'end',
        'sort',
        'text',
        'is_display'
    ];

}
