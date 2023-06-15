<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaDeckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_deck', function (Blueprint $table) {
            $table->unsignedBigInteger('id_deck');
            $table->foreign('id_deck')->references('id')->on('decks');
            $table->unsignedBigInteger('id_carta');
            $table->foreign('id_carta')->references('id')->on('cartas');
            $table->integer('copias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista_deck');
    }
}
