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
        'profession',
        'city',
        'phone',
        'mail',
        'telegram',
        'whatsapp',
        'vk'
    ];


    protected $appends = [
        'photo_url',
        'year_birth_date',
    ];

    public function getPhotoUrlAttribute() {
        // Storage::disk('public')->exists() проверяет, существует ли файл физически
        if($this->photo && Storage::disk('public')->exists($this->photo)) {
            return Storage::disk('public')->url($this->photo);
        }
        return null;
    }

    public function getYearBirthDateAttribute() {
        if($this->year_birth) {
            return explode(' ', $this->year_birth)[0];
        }
        return null;
    }
}
