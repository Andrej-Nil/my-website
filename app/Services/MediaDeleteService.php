<?php

namespace App\Services;

use App\Repositories\MediaRepository;
use Illuminate\Support\Facades\Storage;

class MediaDeleteService
{
    public function handle($mediaLink){

        $media = MediaRepository::getMediaByLink($mediaLink);
        if(!$media){
            return [
                'success' => false,
                'message' => 'Медиа не существует или уже удалено'
            ];
        }

        $rez = MediaRepository::deleteMedia($media['id']);
        if(!$rez){
            return [
                'success' => false,
                'message' => 'Медиа не существует или уже удалено'
            ];
        }
        Storage::disk('public')->delete($media['link']);

        return [
            'success' => true,
            'message' => 'Медиа удалено'
        ];
    }
}
