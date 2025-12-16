<?php

namespace App\Helper;

class ExtensionHelper
{
     const extensionList = [
            'jpg'=>'image',
            'jpeg'=>'image',
            'png'=>'image',
            'mp4'=>'video'
        ];


    public static function getType($extension){
        if(isset(self::extensionList[$extension])){
            return (self::extensionList[$extension]);
        } else {
            return false;
        }
    }

}
