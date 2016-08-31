<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->username,
        'email' => $faker->safeEmail,
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'country' => $faker->country,
        'github_id' => str_random(3),
        'avatar' => 'https://www.gravatar.com/avatar/04d24379cd970b7670ee66fa203d646f?s=80&r=any&default=identicon&forcedefault=1',
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\BlogEntry::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(6, true),
        'body' => $faker->paragraph,
    ];
});
