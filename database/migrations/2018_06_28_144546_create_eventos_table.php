<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->date('data');
            $table->integer('persona_id');
            $table->integer('game_id');
            $table->timestamps();
        });
        
        Schema::table('eventos', function (Blueprint $table) {          
            $table->foreign('game_id')->references('id')->on('Game');
            $table->foreign('persona_id')->references('id')->on('Persona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
