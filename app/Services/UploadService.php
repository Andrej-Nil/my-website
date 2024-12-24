<?php

namespace App\Services;

class UploadService {
    public static function isExtensionPhoto($extension) {
        $extension = strtolower($extension);
        if (
            $extension == 'png' ||
            $extension == 'jpg' ||
            $extension == 'jpeg'
        ) {
            return true;
        }
        return false;
    }
}
