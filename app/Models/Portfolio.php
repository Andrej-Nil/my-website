<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'link',
        'photo',
        'text',
        'is_display',
    ];




    protected $appends = [
        'photo_url',
        'text_short',
    ];



    public function getPhotoUrlAttribute() {
        // Storage::disk('public')->exists() проверяет, существует ли файл физически
        if($this->photo && Storage::disk('public')->exists($this->photo)) {
            return Storage::disk('public')->url($this->photo);
        }
        return null;
    }

    public function getTextShortAttribute() {
        $len = 300;
        if($this->text) {
            $short = substr($this->text, 0,$len);
            if(strlen($short) === $len){
                $short = $short . '...';
            }
            return  $short;
        }
        return null;
    }
}
