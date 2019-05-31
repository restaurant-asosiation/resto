<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Restaurant::class, function (Faker $faker) {
    $name = $faker->company;
    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'telephone' => $faker->e164PhoneNumber,
        'description' => $faker->text(50),
        'province' => $faker->state,
        'city'=> $faker->city,
        'address' => $faker->address,
    ];
});
