<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    private static $categories = [
        1 => [
            'id' => 1,
            'name' => 'Горячие новости',
            'slug' => 'hot'
        ],
        [
            'id' => 2,
            'name' => 'Жуткие новости',
            'slug' => 'horrible'
        ],
        [
            'id' => 3,
            'name' => 'Добрые новости',
            'slug' => 'good'
        ]
    ];

    public static function getCategories() {
        return static::$categories;
    }

    public static function getCategoryById($id) {
        return static::getCategories()[$id];
    }

    public static function getCategoryIdByName($slug) {
        $id = null;
        foreach (static::$categories as $category) {
            if ($category['slug'] == $slug) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }
}
