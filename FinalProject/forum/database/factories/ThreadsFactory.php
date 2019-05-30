<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User as User;
use App\Thread as Thread;


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

$factory->define(Thread::class, function (Faker $faker) {

    $validID = User::pluck('id')->toArray();

    return [
        'creator_id' => $validID[array_rand($validID)],
        'title' => $faker->realText($faker->numberBetween(10,50)),
        'body' => $faker->realText($faker->numberBetween(50,250)),
    ];
});
