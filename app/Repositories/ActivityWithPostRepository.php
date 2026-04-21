<?php

namespace App\Repositories;



use App\Models\ActivityWithPost;

class ActivityWithPostRepository
{


    public static function getActivityWithPostByCookieId(string $CookieId):array{
        $item = ActivityWithPost::find($CookieId);
        return $item ? $item->toArray() : [];
    }


    public static function firstOrCreateActivityWithPost(array $data):array{
//        $item = ActivityWithPost::find($CookieId);
        $item = ActivityWithPost::firstOrCreate($data);
        return $item ? $item->toArray() : [];
    }



    public static function createActivityWithPost(array $data):array{
        return ActivityWithPost::create($data)->toArray();
    }

    public static function getActivityWithPostByViewingCount(int $postId, int $data = 1):int{
        return ActivityWithPost::where( ['post_id' => $postId, 'viewing' => $data])->count();
    }




//$post = Post::withCount(['views', 'likes'])->find($postId);

    public static function getActivityWithPostByPostId(int $postId){
        return ActivityWithPost::selectRaw("
            SUM(CASE WHEN viewing = '1' THEN 1 ELSE 0 END) as viewing_count,
            SUM(CASE WHEN reaction = '1' THEN 1 ELSE 0 END) as like_count,
            SUM(CASE WHEN reaction = '2' THEN 1 ELSE 0 END) as dislike_count
        ")->where('post_id', $postId)->first()->toArray();
    }


    public static function getActivityWithPostByPostIdAndCookieId($postId, $cookieId)
    {
        $item = ActivityWithPost::where(['post_id' => $postId, 'cookie_id' => $cookieId])->first();
        return $item ? $item->toArray() : [];
    }


    public static function updateActivityWithPost(int $postId, $cookieId, array $data):bool{
        return ActivityWithPost::where(['post_id' => $postId, 'cookie_id' => $cookieId])->update($data);
    }
//
//
//
//    public static function getActivityWithPostByLikeCount(int $postId)
//    {
//        $item = ActivityWithPost::where(['post_id' => $postId, 'reaction' => 1])->first();
//        return $item ? $item->toArray() : [];
//    }
//

//    public static function getActivityWithPostByLikeCount(int $postId)
//    {
//        $item = ActivityWithPost::where(['post_id' => $postId, 'reaction' => 1])->first();
//        return $item ? $item->toArray() : [];
//    }
//
//    public static function getActivityWithPostByDislikeCount(int $postId)
//    {
//        $item = ActivityWithPost::where(['post_id' => $postId, 'reaction' => 2])->first();
//        return $item ? $item->toArray() : [];
//    }

//    public static function getLakeAndDislikeCount(int $postId = 1){
//        return ActivityWithPost::
//    }


//    public static function getPagination(array $data = [], int $count = 20):array{
//
//        if(isset($data['search'])){
//            return Hobby::where('title', 'LIKE', '%'.$data['search'].'%')->
//            orderBy($data['sort']['key'], $data['sort']['type'])->
//            paginate($count)->
//            appends($data['params'])->
//            toArray();
//        }
//
//        return Hobby::orderBy($data['sort']['key'], $data['sort']['type'])->
//        paginate($count)->
//        appends($data['params'])->
//        toArray();
//
//    }
//
//    public static function createHobby(array $data):array{
//        return Hobby::create($data)->toArray();
//    }
//
//    public static function getHobbyById(int $id):array{
//        $item = Hobby::find($id);
//        return $item ? $item->toArray() : [];
//    }
//
//    public static function updateHobby(int $id, array $data):bool{
//        return Hobby::where('id', $id)->update($data);
//    }
//
//    public static function deleteHobby(int $id):bool{
//        return Hobby::where('id', $id)->delete();
//    }
//
//    public static function getHobbyByIsDisplay(){
//        return Hobby::where('is_display', 1)->
//        get()->
//        toArray();
//    }
//
//    public static function getHobbyByIdDisplayAndSort(){
//        return Hobby::where(['is_display' => 1])->orderBy('sort', 'ASC')->get()->toArray();
//    }
//
//    public static function updateSort($id, $sort)
//    {
//        $result = Hobby::where('id', $id);
//        if ($result) {
//            return $result->update(['sort' => $sort]);
//        } else {
//            return false;
//        }
//    }
//    public static function getArticleById(int $id):array{
//        $item = Article::find($id);
//        return $item ? $item->toArray() : [];
//    }
//    public static function getArticleBySlug(string $slug):array{
//        $item = Article::where( 'slug', $slug)->first();
//        return $item ? $item->toArray() : [];
//    }
}
