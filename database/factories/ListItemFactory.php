<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Model\ListItem;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(ListItem::class, function (Faker $faker) {
    return [
        'checklist_id' => rand(1, 20),
        'body' => $faker->title,
        'done' => rand(0, 1),
    ];
});