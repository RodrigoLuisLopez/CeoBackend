<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecomendacionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recomendacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nota');
            $table->integer('recomendador_id')->unsigned();
            $table->integer('recomendado_id')->unsigned();
            $table->integer('alcance_id')->unsigned();
            $table->integer('giro_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('recomendador_id')->references('id')->on('usuarios');
            $table->foreign('recomendado_id')->references('id')->on('usuarios');
            $table->foreign('alcance_id')->references('id')->on('alcances');
            $table->foreign('giro_id')->references('id')->on('giros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recomendacions');
    }
}
