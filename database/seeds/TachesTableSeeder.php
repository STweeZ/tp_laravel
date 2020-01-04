<?php

use Illuminate\Database\Seeder;

class TachesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Tache::class, 20)->create();
    }
}