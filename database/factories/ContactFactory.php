<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contact;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'user_id' => User::all()->random()->id,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => Str::random(10).'@gmail',
        'birthday' => $faker->dateTimeBetween('-100 years', '-18 years'),
        'job_title' => $faker->title,
        'city' => $faker->city,
        'country' => $faker->country,
    ];
});
