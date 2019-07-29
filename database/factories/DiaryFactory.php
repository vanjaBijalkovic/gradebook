<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Diary;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Diary::class, function (Faker $faker) {
    return [
        'title' => $faker->numerify('Razred ##'), 
        'professor_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
