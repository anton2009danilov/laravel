<?php

namespace App;

use App\Rules\Jedi;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
//    public $timestamps = false;
    protected $fillable = ['title', 'text', 'isPrivate', 'category_id'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id')->first();
    }

    public static function rules() {
        $tableNameCategory = (new Category())->getTable();
        return [
//            'title' => ['required', 'min:5', 'max:25', new Jedi()],
            'title' => ['required', 'min:5', 'max:45'],
            'text' => 'required|min:15',
            'category_id' => "required|exists:{$tableNameCategory},id",
            'image' => 'mimes:jpeg,bmp,png|max:1000',
            'isPrivate' => "sometimes|in:1",
        ];
    }

    public static function attributeNames() {
        return [
            'title' => 'Заголовок',
            'text' => 'Текст',
            'category_id' => 'Категория',
            'image' => 'Изображение'
        ];
    }
}
