<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    private static $news = [

        1 => [
            'id' => 1,
            'title' => 'Новость 1 (крайне интересно)',
            'text' => 'Горячая новость №1',
            'category_id' => 1,
            'isPrivate' => true
        ],
        [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'Леденящая кровь новость 1',
            'category_id' => 2,
            'isPrivate' => false
        ],
        [
            'id' => 3,
            'title' => 'Новость 3',
            'text' => 'Прогноз: всё будет хорошо',
            'category_id' => 3,
            'isPrivate' => false
        ],
        [
            'id' => 4,
            'title' => 'Новость 4 (крайне интересно)',
            'text' => 'Горячая новость №2',
            'category_id' => 1,
            'isPrivate' => true
        ],
        [
            'id' => 5,
            'title' => 'Новость 5',
            'text' => 'Горячая новость №3',
            'category_id' => 1,
            'isPrivate' => false
        ],
        [
            'id' => 6,
            'title' => 'Новость 6 (крайне интересно)',
            'text' => 'Леденящая кровь новость 2',
            'category_id' => 2,
            'isPrivate' => true
        ],
    ];

    public static function getNews()
    {
        return static::$news;
    }

    public static function getNewsId($id)
    {
        return static::$news[$id];
    }
}
