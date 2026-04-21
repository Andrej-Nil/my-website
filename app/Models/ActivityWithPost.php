<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityWithPost extends Model
{
    protected $fillable = [
        'cookie_id',
        'ip_address',
        'post_id',
        'reaction',
        'photo_list',
        'viewing',
    ];

}
