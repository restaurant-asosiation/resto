<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $nip = (mt_rand(0, 1) == 0) ? $faker->unique()->nik() : '' ; //cek apakah user mendapatkan nip
    $name = $faker->name;
    $user = [
        'nip' => $nip,
        'name' => $name,
        'slug' => Str::slug($name),
        'telephone' => $faker->e164PhoneNumber,
        'sex' => $faker->numberBetween(1,2),
        'birth_day' => $faker->date(),
        'address' => $faker->address,
        'employe_status' => $faker->numberBetween(1,2),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];

    if (isset($nip)) { //jika memiliki NIP
        $user->assignRole('employee'); //Role == employee
    } else {
        $user->assignRole('owner');
    }

    return $user;
});