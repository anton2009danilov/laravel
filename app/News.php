<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function MongoDB\BSON\fromJSON;

class News extends Model
{
    public static function getNews()
    {
        $news = \Storage::get('news.json');
        $news = json_decode($news, true);
        return $news;
    }

    public static function getNewsId($id)
    {
        return static::getNews()[$id];

    }

    public static function getNewsByCategoryName($name) {
        $id = Category::getCategoryIdByName($name);
        $news = [];
        foreach (static::getNews() as $item) {
            if($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }
}
