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

$factory->define(App\Models\Product::class, function (Faker $faker) {
	$products = ['Asus', 'ROG', 'Lenovo', 'Lumia', 'Macbook Air', 'Macbook Pro', 'Toshiba', 'Bike', 'TV', 'LCD', 'LED'];
    return [
       'product_name' => $products[rand(0, 10)] . ' ' . ucwords($faker->word),
       'price' => $faker->numberBetween($min = 110, $max = 30),
       'stock' => $faker->numberBetween($min = 1, $max = 10),
       'images' => $faker->imageUrl($width = 500, $height = 500),
       'description' => $faker->text($maxNbChars = 200),
       'created_at' => $faker->dateTime($max = 'now')
    ];
});
