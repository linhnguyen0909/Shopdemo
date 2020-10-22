<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'id'=>$faker->uuid,
        'user_id'=>\App\User::all()->random()->id,
        'title'=>$faker->title,
        'description'=>Str::random(20),
    ];
});
