<?php
namespace App\Repositories;
use App\Models\Image;

class ImageRepository
{
    public static function getPagination(int $count = 40):array{
        return Image::limit($count)->orderBy('id', 'DESC')->get()->toArray();
    }

    public static function createImage(string $link):array{
        return Image::create(['link' => $link])->toArray();
    }

    public static function getImgById(int $id):array{
        $item = Image::find($id);
        return $item ? $item->toArray() : [];
    }
//    public static function getPagination(int $count = 20):array{
//        return Article::limit($count)->orderBy('id', 'DESC')->get()->toArray();
//    }

//    public static function updateArticle(int $id, array $data):bool{
//        return Article::where('id', $id)->update($data);
//    }
    public static function deleteImage(int $id):bool{
        return Image::where('id', $id)->delete();
    }
//    public static function getArticleById(int $id):array{
//        $item = Article::find($id);
//        return $item ? $item->toArray() : [];
//    }
//    public static function getArticleBySlug(string $slug):array{
//        $item = Article::where( 'slug', $slug)->first();
//        return $item ? $item->toArray() : [];
//    }
}
