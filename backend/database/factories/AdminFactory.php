<?php

use App\Models\Admin;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Admin::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => $password ?: $password = bcrypt('test1234'),
        'remember_token' => Str::random(10),
    ];
});