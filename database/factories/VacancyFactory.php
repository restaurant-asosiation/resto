<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Vacancy;
// use App\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Vacancy::class, function (Faker $faker) {s
    return [
        'restaurant_id ' => $faker->numberBetween(1, 5),
        'position ' => $faker->sentence(20),
        'slug' => Str::slug($position),
        'job_desc' => $faker->sentence(50),
        'requirement' => $faker->text(100),
        // 'salary' => $faker->salary,
        // 'city'=> $faker->city,
        // 'address' => $faker->address,
    ];
});
