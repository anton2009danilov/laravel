<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    private static $categories = [
        2 => [
            'id' => 2,
            'name' => 'Горячие новости',
            'alias' => 'hot'
        ],
        [
            'id' => 3,
            'name' => 'Жуткие новости',
            'alias' => 'horrible'
        ],
        [
            'id' => 4,
            'name' => 'Добрые новости',
            'alias' => 'good'
        ]
    ];

    public static function getCategories() {
        return static::$categories;
    }

    public static function getCategoryId($id) {
        return static::getCategories()[$id];
    }
}
