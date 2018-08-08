
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AtualizacaoBanco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('amigos',function (Blueprint $table) {
        		$table->integer('persona_id')->unsigned();
            $table->integer('personaAmigo_id')->unsigned();
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('personaAmigo_id')->references('id')->on('personas');
        });
        
        Schema::table('solicitacao_de__guildas', function (Blueprint $table) {
            $table->integer('persona_id')->unsigned();
            $table->integer('guilda_id')->unsigned();
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('guilda_id')->references('id')->on('guildas');
        });
        
        Schema::table('guildas', function (Blueprint $table) {
            $table->integer('game_id')->unsigned();
            $table->integer('administrador_id')->unsigned();
            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('administrador_id')->references('id')->on('personas');
        });
        
        Schema::table('cargos_da__guildas', function (Blueprint $table) {
            $table->integer('guilda_id')->unsigned();
            $table->foreign('guilda_id')->references('id')->on('guildas');
        });
        
        Schema::table('personas', function (Blueprint $table) {       
            $table->integer('usuario_id')->unsigned();
            $table->integer('game_id')->unsigned();    
            $table->integer('guilda_id')->unsigned()->nullable();
            $table->integer('cargosGuilda_id')->unsigned()->nullable();
            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('guilda_id')->references('id')->on('guildas');
            $table->foreign('cargosGuilda_id')->references('id')->on('cargos_da__guildas');
        });
        Schema::table('users', function (Blueprint $table) {
        		$table->integer('personaPadrao')->unsigned()->nullable();
        		$table->string('nome_persona')->nullable();
        		$table->foreign('personaPadrao')->references('id')->on('personas');

        });
        Schema::table('eventos', function (Blueprint $table) {    
        		$table->integer('persona_id')->unsigned();;
            $table->integer('game_id')->unsigned();;    
            $table->integer('guilda_id')->unsigned();;  
            $table->foreign('game_id')->references('id')->on('games');
            $table->string('nome_persona');
            $table->string('nome_guilda')->nullable();
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('guilda_id')->references('id')->on('guildas');
            
        });
        
        Schema::table('solicitacao_de__amizades', function (Blueprint $table) {    
        		$table->integer('personaDestino_id')->unsigned();
            $table->integer('personaRemetente_id')->unsigned();   
            $table->foreign('personaDestino_id')->references('id')->on('personas');
            $table->foreign('personaRemetente_id')->references('id')->on('personas');
            
        });
        
        Schema::table('posts', function (Blueprint $table) {    
            $table->integer('persona_id')->unsigned();   
            $table->integer('guilda_id')->unsigned()->nullable();
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('guilda_id')->references('id')->on('guildas');
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
