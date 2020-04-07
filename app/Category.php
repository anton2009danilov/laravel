<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static $categories =
        [
            "1" => [
                "id" => 1,
                "name" => "Горячие новости",
                "slug" => "hot"
            ],
            "2" => [
                "id" => 2,
                "name" => "Жуткие новости",
                "slug" => "horrible"
            ],
            "3" => [
                "id" => 3,
                "name" => "Добрые новости",
                "slug" => "good"
            ]
        ];


    public static function getCategories()
    {
        $categories = \Storage::get('categories.json');
        $categories = json_decode($categories, true);
        return $categories;
    }

    public static function getCategoryById($id)
    {
        return static::getCategories()[$id];
    }

    public static function getCategoryIdByName($slug)
    {
        $id = null;
        foreach (static::getCategories() as $category) {
            if ($category['slug'] == $slug) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }
}
