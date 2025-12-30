<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
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
