<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 90);
            $table->string('apodo', 90);
            $table->string('logo', 90);
            $table->string('estadio', 90);
            $table->string('uniforme', 90);
            $table->string('sitio_web', 90);
            $table->integer('ligas_id')->unsigned();
            $table->timestamps();

            $table->foreign('ligas_id')->references('id')->on('ligas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
