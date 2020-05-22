<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Models\Food\Restaurant::class, function (Faker $faker) {
    return [
        "name" => $faker->text
    ];
});
