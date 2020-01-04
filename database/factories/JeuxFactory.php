<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Jeu;
use Faker\Generator as Faker;

$factory->define(Jeu::class, function (Faker $faker) {
    return [
        'nom'=>$faker->name,
        'age_min'=>$faker->numberBetween($min = 10, $max = 25),
        'min_max_joueurs'=>$faker->numberBetween($min = 0, $max = 300),
        'min_max_duree'=>$faker->numberBetween($min = 0, $max = 1000),
        'image'=>$faker->imageUrl(100,100,'',true),
        'description'=>$faker->text
    ];
});
