<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentidadColorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identidad_color', function (Blueprint $table) {
            $table->unsignedBigInteger('id_carta');
            $table->unsignedBigInteger('id_color');
            $table->foreign('id_carta')->references('id')->on('cartas');
            $table->foreign('id_color')->references('id')->on('colors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identidad_color');
    }
}
