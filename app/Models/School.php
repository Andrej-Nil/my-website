<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'title',
        'specialization',
        'is_current',
        'start',
        'end',
        'sort',
        'text',
        'is_display'
    ];
}
