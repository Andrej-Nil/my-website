<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'first_name',
        'second_name',
        'photo',
        'about',
        'age',
        'city',
        'phone',
        'mail',
        'telegram',
        'whatsapp',
        'vk'
    ];
}
