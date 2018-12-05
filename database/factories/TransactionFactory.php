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

$factory->define(App\Models\Transaction::class, function (Faker $faker) {
    return [
       'invoice' => 'TR' . date('dmy') . rand(1, 100),
       'client_name' => 'Envato Pty Ltd',
       'client_address' => '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom',
       'client_phone' => '800-692-7753',
       'total_price' => $faker->numberBetween($min = 110, $max = 30),
       'created_at' => $faker->dateTime($max = 'now')
    ];
});
