<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Recruitment;
use App\User;

$factory->define(Recruitment::class, function (Faker $faker) {
    return [
        'user_id'=>User::all()->where('admin', '!=', 1)->random()->id,
        'offered_position' => $faker->jobTitle,
        'description' => $faker->text,
        'status' => $faker->numberBetween(1,3),
        'created_at' => $faker->dateTimeThisYear,
        'updated_at'=>$faker->dateTimeThisMonth
    ];
});

