<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function news() {
        return $this->hasMany(News::class, 'category_id');
    }

    public static function rules() {
        return [
            'name' => ['required', 'min:5', 'max:25'],
            'slug' => 'required|min:3|max:15',
        ];
    }

    public static function attributeNames() {
        return [
            'name' => 'Название',
            'slug' => 'Псевдоним',
        ];
    }

}
