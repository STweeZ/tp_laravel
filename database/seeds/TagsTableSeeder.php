<?php

use App\Models\Tag;
use App\Models\Jeu;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Tag::class, 20)->create();

        $jeux=Jeu::all();
        $tags_id=Tag::all('id')->pluck('id')->toArray();
        $faker=Faker\Factory::create('fr_FR');

        foreach($jeux as $jeu){
            $nbTags=$faker->numberBetween($min=1,$max=10);
            $id_tags=$faker->unique()->randomElements($tags_id,$nbTags);
            $jeu->tags()->attach($id_tags);
            $jeu->save();
        }
    }
}