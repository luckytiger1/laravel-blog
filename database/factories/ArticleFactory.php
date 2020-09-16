<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\Models\User::class),
        'title' => $faker->sentence,
        'description' => $faker->sentence,
        'body' => $faker->paragraph
    ];
});
