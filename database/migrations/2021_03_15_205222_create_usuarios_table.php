<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('edad');
            $table->string('direccion');
            $table->string('correo');
            $table->string('telefono');
            $table->string('biografia', 700);
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->integer('estado_id')->unsigned();
            $table->integer('privacidad_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('privacidad_id')->references('id')->on('privacidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuarios');
    }
}
