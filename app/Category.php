<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    private static $categories = [
        [
            'id' => 1,
            'name' => 'Горячие новости',
            'alias' => 'hot'
        ],
        [
            'id' => 2,
            'name' => 'Жуткие новости',
            'alias' => 'horrible'
        ],
        [
            'id' => 3,
            'name' => 'Добрые новости',
            'alias' => 'good'
        ]
    ];

    public static function getCategories() {
        $categories = [];
        foreach (static::$categories as $key => $item) {
            $categories[$item['id']] = static::$categories[$key];
        }
        return $categories;
    }

    public static function getCategoryId($id) {
//        var_dump($id);
//        var_dump(static::getCategories()[$id]);
//        die;
        return static::getCategories()[$id];
    }
}
