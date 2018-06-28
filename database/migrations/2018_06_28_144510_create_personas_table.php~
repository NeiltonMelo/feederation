<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->integer('game_id')->unsigned();
            $table->date('nascimento');
            $table->string('sexo');
            $table->string('nome');
            $table->string('sobrenome');
            $table->timestamps();
        });
        
        Schema::table('personas', function (Blueprint $table) {            
            $table->foreign('game_id')->references('id')->on('Game');
            $table->foreign('usuario_id')->references('id')->on('Usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
