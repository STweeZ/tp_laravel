<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsJeuxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pweb.tags_jeux', function (Blueprint $table) {
            $table->bigInteger('tag_id')->unsigned();
            $table->bigInteger('jeu_id')->unsigned();
            $table->foreign('tag_id')->references('id')->on('pweb.tags')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jeu_id')->references('id')->on('pweb.jeux')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('pweb.tags_jeux');
    }
}
