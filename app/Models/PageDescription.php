<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PageDescription extends Model
{
    protected $fillable = [
        'title',
        'photo',
        'text',
        'sort',
        'is_display'
    ];

    protected $appends = [
        'photo_url'
    ];

    public function getPhotoUrlAttribute() {
        // Storage::disk('public')->exists() проверяет, существует ли файл физически
        if($this->photo && Storage::disk('public')->exists($this->photo)) {
            return Storage::disk('public')->url($this->photo);
        }
        return null;
    }

}
