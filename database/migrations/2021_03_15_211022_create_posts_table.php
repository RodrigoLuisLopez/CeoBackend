<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('subtitulo');
            $table->string('contenido', 2000);
            $table->integer('usuario_id')->unsigned();
            $table->integer('privacidad_id')->unsigned();
            $table->integer('estado_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('privacidad_id')->references('id')->on('privacidads');
            $table->foreign('estado_id')->references('id')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
