<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User as User;
use App\Thread as Thread;
use App\Reply as Reply;

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

$factory->define(Reply::class, function (Faker $faker) {

    $availableThreads = Thread::pluck('id')->toArray();
    $availableUsers = User::pluck('id')->toArray();

    return [
        'creator_id' => $availableUsers[array_rand($availableUsers)],
        'thread_id' => $availableThreads[array_rand($availableThreads)],
        'body' => $faker->realText($faker->numberBetween(15,300)),
    ];
});
