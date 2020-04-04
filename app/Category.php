<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public static function getCategories() {
        $categories = \Storage::get('categories.json');
        $categories = json_decode($categories, true);
        return $categories;
    }

    public static function getCategoryById($id) {
        return static::getCategories()[$id];
    }

    public static function getCategoryIdByName($slug) {
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
