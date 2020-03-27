<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    private static  $news = [
      [
          'id' => 1,
          'title' => 'Новость 1',
          'text' => 'Горячая новость №1'
      ],
      [
          'id' => 2,
          'title' => 'Новость 2',
          'text' => 'Леденящая кровь новость'
      ],
      [
          'id' => 3,
          'title' => 'Новость 3',
          'text' => 'Прогноз: всё будет хорошо'
      ]
    ];

    public static function getNews() {
        return static ::$news;
    }

    public static function getNewsId($id) {
        foreach (static::$news as $news) {
            if ($news['id'] == $id) {
                return $news;
            }
        }
    }
}
