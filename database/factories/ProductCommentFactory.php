<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ProductComment;
use Faker\Generator as Faker;

$factory->define(ProductComment::class, function (Faker $faker) {
    return [
        'comment' => $faker->sentence(),
        'user_id' => factory(\App\User::class),
        'product_id' => factory(\App\Product::class),
    ];
});
