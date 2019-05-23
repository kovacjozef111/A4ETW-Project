<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User as User;

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
    return [
        'nick' => $faker->name,
        'password' => bcrypt(Str::random(10)),
        'admin' => false,
        'email' => $faker->email,
    ];
});
