<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = [
        'title',
        'photo_list',
        'text',
        'sort',
        'is_display'
    ];

    protected $casts = [
        'photo_list' => 'array',
    ];


    protected $appends = [
        'photo_list_url',
        'create_date'
    ];

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

    public function getCreateDateAttribute() {

        if($this->created_at) {
            return explode(' ', $this->created_at)[0];
        }

        return null;
    }

    public function reactions() {
        return $this->hasMany(ActivityWithPost::class, 'post_id');
    }


}
