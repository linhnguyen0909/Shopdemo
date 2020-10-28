<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Book;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'user_id' => User::all()->random()->id,
        'title' => $faker->title,
        'description' => Str::random(10),
        'created_at' => Carbon::now()->getTimestamp(),
        'updated_at' => Carbon::now()->getTimestamp(),
    ];
});
