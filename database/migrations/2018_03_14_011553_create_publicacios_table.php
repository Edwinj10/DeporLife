<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicaciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('categoria_id');
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('resumen');
            $table->string('slug');
            $table->string('importante');
            $table->string('tipo');
            $table->string('total_visitas');
            $table->string('foto');
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
        Schema::dropIfExists('publicacios');
    }
}
