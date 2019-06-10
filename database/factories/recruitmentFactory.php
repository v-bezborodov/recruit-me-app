<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Recruitment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'company' => $faker->company,
        'country' => $faker->country,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'created_at' => $faker->dateTimeThisYear,
        'updated_at'=>$faker->dateTimeThisMonth
    ];
});
