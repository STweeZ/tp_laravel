<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tag_jeu;
use Faker\Generator as Faker;

$factory->define(Tag_jeu::class, function (Faker $faker) {
    return [
        'tag_id'=>rand(1,20),
        'jeu_id'=>rand(1,20)
    ];
});