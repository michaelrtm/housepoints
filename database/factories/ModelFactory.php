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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\House::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'color' => $faker->colorName,
        'blurb' => $faker->paragraph(5),
        'hex' => $faker->hexcolor,
    ];
});

$factory->define(App\Student::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'house_id' => random_int(1,4),
        'grade_id' => random_int(1,27)
    ];
});

$factory->define(App\Score::class, function (Faker\Generator $faker) {
    static $scores = [5,10,20,50];

    return [
        'house_id' => random_int(1,4),
        'score' => $scores[array_rand($scores)],
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
    ];
});