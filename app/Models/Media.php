<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $fillable = [
        'link',
        'type',
    ];

    protected $appends = ['url'];

    public function getUrlAttribute() {
        // Storage::disk('public')->exists() проверяет, существует ли файл физически
        if($this->link && Storage::disk('public')->exists($this->link)) {
            return Storage::disk('public')->url($this->link);
        }
        return null;
    }
}
