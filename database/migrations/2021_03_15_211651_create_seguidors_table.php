<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguidorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguidors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seguido_id')->unsigned();
            $table->integer('seguidor_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('seguido_id')->references('id')->on('usuarios');
            $table->foreign('seguidor_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seguidors');
    }
}
