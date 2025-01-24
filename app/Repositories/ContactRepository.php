<?php
namespace App\Repositories;
use App\Models\Contact;

class ContactRepository
{

    public static function getContacts():array{
        return Contact::orderBy('id', 'DESC')->where('is_display', 1)->with('photo')->get()->toArray();
    }
    public static function getPagination():array{
        return Contact::orderBy('id', 'DESC')->get()->toArray();
    }

    public static function createContact($data):array{
        return Contact::create($data)->toArray();
    }

    public static function getContactById(int $id):array{
        $item = Contact::with('photo')->find($id);
        return $item ? $item->toArray() : [];
    }
//    public static function getPagination(int $count = 20):array{
//        return Article::limit($count)->orderBy('id', 'DESC')->get()->toArray();
//    }

    public static function updateContact(int $id, array $data):bool{
        return Contact::where('id', $id)->update($data);
    }
    public static function deleteContact(int $id):bool{
        return Contact::where('id', $id)->delete();
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
