<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')->unsigned();
            $table->string('nome');
            $table->string('sobrenome');
            $table->integer('tipoUsuario_id');
            $table->string('sexo');
            $table->date('nascimento');
            $table->string('email');
            $table->timestamps();
        });
        
        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('tipoUsuario_id')->references('id')->on('TipoUsuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
