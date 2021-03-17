<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('edad')->default('1');
            $table->string('direccion')->default('1');
            $table->string('telefono')->default('1');
            $table->string('biografia', 700)->default('1');
            $table->string('facebook')->default('1');
            $table->string('twiter')->default('1');
            $table->string('instagram')->default('1');
            $table->integer('estado_id')->unsigned()->default('1');
            $table->integer('privacidad_id')->unsigned()->default('1');
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rol_id');
        });
    }




}
