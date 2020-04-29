<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Person::class, function (Faker $faker) {
    return [
        'identification'=> $faker->postcode,
        'name'=>$faker->name,
        'mobile'=> $faker->postcode,
    ];
});
