<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    private static $news = [

        [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'Горячая новость №1',
            'category_id' => 1
        ],
        [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'Леденящая кровь новость 1',
            'category_id' => 2
        ],
        [
            'id' => 3,
            'title' => 'Новость 3',
            'text' => 'Прогноз: всё будет хорошо',
            'category_id' => 3
        ],
        [
            'id' => 4,
            'title' => 'Новость 4',
            'text' => 'Горячая новость №2',
            'category_id' => 1
        ],
        [
            'id' => 5,
            'title' => 'Новость 5',
            'text' => 'Горячая новость №3',
            'category_id' => 1
        ],
        [
            'id' => 6,
            'title' => 'Новость 6',
            'text' => 'Леденящая кровь новость 2',
            'category_id' => 2
        ],
    ];

    public static function getNews()
    {
        $news = [];
        foreach (static::$news as $key => $item) {
            $news[$item['id']] = static::$news[$key];
        }
        return $news;
    }

    public static function getNewsId($id)
    {
        $news = static::getNews();
        return $news[$id];
    }
}
