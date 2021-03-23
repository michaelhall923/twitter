<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tweet;
use App\User;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
    return [
        'user_id'   => factory(User::class),
        'body'      => array_reduce(range(1, rand(1,4)), function($carry, $item) use ($faker) {  return $carry . $faker->sentence() . " "; }, "") // $faker->sentence() . " " . $faker->sentence(),
    ];
});
