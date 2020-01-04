<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Commentaire;
use Faker\Generator as Faker;

$factory->define(Commentaire::class, function (Faker $faker) {
    return [
        'auteur_id'=>-1,
        'titre'=>$faker->name,
        'body'=>$faker->text,
        'auteur'=>$faker->name,
        'jeu_id'=>rand(1,20)
    ];
});
