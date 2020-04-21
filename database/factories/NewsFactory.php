<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {

    return [
        'title' => $faker->realText(rand(10,15)),
        'text' => $faker->realText(rand(300,800)),
        'category_id'=> random_int(1,3),
        'isPrivate' => false,
    ];
});
