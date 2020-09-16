<?php

/** @var Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\Models\User::class),
        'article_id' => factory(\App\Models\Article::class),
        'body' => $faker->paragraph
    ];
});
