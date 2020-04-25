<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    protected $fillable = ['rss'];

    public static function rules() {
        return [
            'rss' => ['required', 'min:10']
        ];
    }
}
