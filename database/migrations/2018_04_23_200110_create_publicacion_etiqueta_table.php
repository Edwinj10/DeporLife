<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicacionEtiquetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacion_etiqueta', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('publicacio_id')->unsigned();
            $table->integer('etiqueta_id')->unsigned();
            
            $table->timestamps();

            //relation
            $table->foreign('publicacio_id')->references('id')->on('publicacios')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('etiqueta_id')->references('id')->on('etiquetas')
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
        //
    }
}
