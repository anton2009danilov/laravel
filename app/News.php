<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function MongoDB\BSON\fromJSON;

class News extends Model
{
    public static $news =
        [
            "1" => [
                "id" => 1,
                "title" => "Новость 1 (крайне интересно)",
                "text" => "Горячая новость №1",
                "category_id" => 1,
                "isPrivate" => true
            ],
            "2" => [
                "id" => 2,
                "title" => "Новость 2",
                "text" => "Леденящая кровь новость 1",
                "category_id" => 2,
                "isPrivate" => false
            ],
            "3" => [
                "id" => 3,
                "title" => "Новость 3",
                "text" => "Прогноз => всё будет хорошо",
                "category_id" => 3,
                "isPrivate" => false
            ],
            "4" => [
                "id" => 4,
                "title" => "Новость 4 (крайне интересно)",
                "text" => "Горячая новость №2",
                "category_id" => 1,
                "isPrivate" => true
            ],
            "5" => [
                "id" => 5,
                "title" => "Новость 5",
                "text" => "Горячая новость №3",
                "category_id" => 1,
                "isPrivate" => false
            ],
            "6" => [
                "id" => 6,
                "title" => "Новость 6 (крайне интересно)",
                "text" => "Леденящая кровь новость 2",
                "category_id" => 2,
                "isPrivate" => true
            ],
        ];


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

    public static function getNewsByCategoryName($name)
    {
        $id = Category::getCategoryIdByName($name);
        $news = [];
        foreach (static::getNews() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }
}
