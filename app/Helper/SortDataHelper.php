<?php

namespace App\Helper;

class SortDataHelper
{
    public static function handle($type){
        $sortData = [];
        if($type == 'a-up'){
            $sortData = ['key' => 'title', 'type' => 'ASC', 'label' => 'От А до Я', 'name' => 'a-up'];
        } elseif($type == 'z-up') {
            $sortData = ['key' => 'title', 'type' => 'DESC', 'label' => 'От Я до А', 'name' => 'z-up'];
        } elseif($type == 'new-up') {
            $sortData = ['key' => 'created_at', 'type' => 'ASC', 'label' => 'Сначало новые', 'name' => 'new-up'];
        } elseif($type == 'old-up') {
            $sortData = ['key' => 'created_at', 'type' => 'DESC', 'label' => 'Сначало старые', 'name' => 'old-up'];
        }
        return $sortData;
    }
}
