<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTachesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pweb.taches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('expiration')->nullable(false);
            $table->string('categorie')->default('A Faire')->nullable(false);
            $table->string('description',2000);
            $table->enum('accomplie', ['O', 'N'])->default('N')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('pweb.taches');
    }
}