<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pweb.commentaires', function (Blueprint $table) {
            $table->bigInteger('auteur_id');
            $table->bigIncrements('id');
            $table->string('titre',70)->nullable(false);
            $table->string('body')->nullable(false);
            $table->string('auteur')->nullable(false);
            $table->bigInteger('jeu_id')->unsigned();
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
        Schema::dropIfExists('pweb.commentaires');
    }
}
