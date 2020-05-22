<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\Drink::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "recipe" => $faker->text,
    ];
});
