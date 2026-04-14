<?php

namespace App\Models;


use App\Repositories\ImageRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Hobby extends Model
{


    protected $fillable = [
        'title',
        'main_photo',
        'bg_photo',
        'mini_photo',
        'photo_list',
        'text',
        'sort',
        'is_display',
    ];



    protected $casts = [
        'photo_list' => 'array',
    ];


    protected $appends = [
        'main_photo_url',
        'bg_photo_url',
        'mini_photo_url',
        'photo_list_url',
    ];

    public function getMainPhotoUrlAttribute() {
        // Storage::disk('public')->exists() проверяет, существует ли файл физически
        if($this->main_photo && Storage::disk('public')->exists($this->main_photo)) {
            return Storage::disk('public')->url($this->main_photo);
        }
        return null;
    }

    public function getBgPhotoUrlAttribute() {
        // Storage::disk('public')->exists() проверяет, существует ли файл физически
        if($this->bg_photo && Storage::disk('public')->exists($this->bg_photo)) {
            return Storage::disk('public')->url($this->bg_photo);
        }
        return null;
    }

    public function getMiniPhotoUrlAttribute() {
        // Storage::disk('public')->exists() проверяет, существует ли файл физически
        if($this->mini_photo && Storage::disk('public')->exists($this->mini_photo)) {
            return Storage::disk('public')->url($this->mini_photo);
        }
        return null;
    }

    public function getPhotoListUrlAttribute() {
        // Storage::disk('public')->exists() проверяет, существует ли файл физически
        $list = [];
        if($this->photo_list){
            foreach ($this->photo_list as $key =>$link){
                if($link && Storage::disk('public')->exists($link)) {
                    $list[] = Storage::disk('public')->url($link);
//                array_push($list, Storage::disk('public')->url($link));
                }
//            $list[$key] = $link;
            }
        }

       return $list;
    }

}
