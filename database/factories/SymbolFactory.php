<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Symbol;
use Faker\Generator as Faker;

$factory->define(Symbol::class, function (Faker $faker) {
    return [
        'symbol'    =>  $faker->text,
        'body'      =>  $faker->text,
    ];
});
