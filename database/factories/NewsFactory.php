<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'author_id'=>$faker->numberBetween(1, 10),
        'title'=>$faker->text(30),
        'body'=>$faker->text(999),
        'img'=>$faker->imageUrl(750,300)
    ];
});
