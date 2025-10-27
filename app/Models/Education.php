<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'title',
        'specialization',
        'is_current_day',
        'start',
        'end',
        'sort',
        'text',
        'is_display'
    ];
}
