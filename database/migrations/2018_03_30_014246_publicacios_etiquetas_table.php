<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PublicaciosEtiquetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacios_etiquetas', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('publicacios_id')->unsigned();
            $table->integer('etiquetas_id')->unsigned();
            
            $table->timestamps();

            //relation
            $table->foreign('publicacios_id')->references('id')->on('publicacios')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('etiquetas_id')->references('id')->on('etiquetas')
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
