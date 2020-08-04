<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

  return [
    'brand_id' => Brand::all()->random()->id,
    'name' => $faker->word,
    'price' => rand(1, 99999),
  ];
});
