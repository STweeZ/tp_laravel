<?php

use Illuminate\Database\Seeder;

class JeuxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Jeu::class, 20)->create();
    }
}