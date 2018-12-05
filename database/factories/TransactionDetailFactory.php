<?php

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

$factory->define(App\Models\TransactionDetail::class, function (Faker $faker) {
    return [
       'price' => $faker->numberBetween($min = 110, $max = 30),
       'qty' => $faker->numberBetween($min = 1, $max = 10),
       'subtotal_price' => $faker->numberBetween($min = 110, $max = 30),
       'created_at' => $faker->dateTime($max = 'now')
    ];
});