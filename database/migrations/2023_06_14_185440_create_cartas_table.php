<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->integer('ataque');
            $table->integer('salud');
            $table->string('img_grande',255);
            $table->string('img_chica',255);
            $table->string('img_sola',255);
            $table->unsignedBigInteger('id_set');
            $table->foreign('id_set')->references('id')->on('sets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartas');
    }
}
