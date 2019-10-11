<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'instagram' => $faker->userName,
        'github' => $faker->userName,
        'web' => $faker->url,
    ];
});
