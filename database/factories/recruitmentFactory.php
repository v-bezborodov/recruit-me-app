<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Recruitment;
use App\Users;

$factory->define(Recruitment::class, function (Faker $faker) {
    return [
        'user_id'=>Users::all()->random()->id,
        'position' => $faker->jobTitle,
        'description' => $faker->text,
        'company' => $faker->company,
        'created_at' => $faker->dateTimeThisYear,
        'updated_at'=>$faker->dateTimeThisMonth
    ];
});

