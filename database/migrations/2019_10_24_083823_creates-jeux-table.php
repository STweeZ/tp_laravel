<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesJeuxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pweb.jeux', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->integer('age_min')->nullable(false);
            $table->integer('min_max_joueurs')->nullable(false);
            $table->integer('min_max_duree')->nullable(false);
            $table->text('image')->nullable();
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pweb.jeux');
    }
}
