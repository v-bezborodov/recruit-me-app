<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Users;
use Faker\Generator as Faker;


$factory->define(Users::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'country' => $faker->country,
//        'company' => $faker->company,
        'password'=>$faker->password,
        'created_at' => $faker->dateTimeThisYear,
        'updated_at'=>$faker->dateTimeThisMonth
    ];
});


