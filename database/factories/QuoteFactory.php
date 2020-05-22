<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\Quote::class, function (Faker $faker) {
    return [
        "source" => $faker->firstName . " " . ucfirst((Str::random(1))) . ". " . $faker->lastName,
        "quote" => $faker->text,
    ];
});
