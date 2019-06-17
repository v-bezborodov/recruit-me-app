<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use Faker\Generator as Faker;


$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'website'=>$faker->url,
        'linkedin'=>'www.linkedin.com/'.$faker->firstName,
        'facebook'=>'www.facebook.com/'.$faker->firstName,
        'phone' => $faker->phoneNumber,
        'country' => $faker->country,
//        'company' => $faker->company,
        'password'=>$faker->password,
        'created_at' => $faker->dateTimeThisYear,
        'updated_at'=>$faker->dateTimeThisMonth
    ];
});


