<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserInfo extends Model
{
    protected $fillable = [
        'first_name',
        'second_name',
        'photo',
        'about',
        'year_birth',
        'city',
        'phone',
        'mail',
        'telegram',
        'whatsapp',
        'vk'
    ];


    protected $appends = [
        'photo_url',
    ];



    public function getPhotoUrlAttribute() {
        // Storage::disk('public')->exists() проверяет, существует ли файл физически
        if($this->photo && Storage::disk('public')->exists($this->photo)) {
            return Storage::disk('public')->url($this->photo);
        }
        return null;
    }
}
