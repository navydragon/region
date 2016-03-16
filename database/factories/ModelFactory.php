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
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Survey::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'user_id' => '1',
    ];
});

$factory->define(App\Survey_question::class, function (Faker\Generator $faker) {
    return [
        'body' => $faker->paragraph,
    ];
});

$factory->define(App\Task::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'user_id' => '1',
    ];
});

$factory->define(App\Test::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'duration' => '30',
        'user_id' => '1',
    ];
});

$factory->define(App\Question::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
    ];
});

$factory->define(App\Answer::class, function (Faker\Generator $faker) {
    return [
        'body' => $faker->sentence,
    ];
});

$factory->define(App\File::class, function (Faker\Generator $faker) {
    return [
        'title' => 'file#',
    ];
});

$factory->define(App\File_bind::class, function (Faker\Generator $faker) {
    return [
        'bind_type' => 'unknown',
    ];
});

$factory->define(App\Commission::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'start_at' => '2016-03-01',
        'end_at' => '2016-03-30',
    ];
});

$factory->define(App\Commission_stage::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
    ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
    ];
});