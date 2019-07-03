<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Model\Checklist;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(Checklist::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 50),
        'title' => $faker->title,
    ];
});
