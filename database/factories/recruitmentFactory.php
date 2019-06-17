<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Recruitment;
use App\User;

$factory->define(Recruitment::class, function (Faker $faker) {
    return [
        'user_id'=>User::all()->random()->id,
        'position' => $faker->jobTitle,
        'description' => $faker->text,
//        'company' => $faker->company,
        'created_at' => $faker->dateTimeThisYear,
        'updated_at'=>$faker->dateTimeThisMonth
    ];
});

