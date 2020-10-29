<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->sentence,
        'slug' => str_shuffle($name),
        'type' => ['Simple', 'Grouped', 'Variable', 'Gift'][rand(0,3)],
        'categories' => ['Electronics', 'Books', 'Games', 'Garden'][rand(0,3)],
    ];
});
