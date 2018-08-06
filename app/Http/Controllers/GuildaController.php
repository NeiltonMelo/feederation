<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use feederation\Guilda;
use feederation\Persona;
use Auth;

class GuildaController extends Controller
{
   public function inserirGuilda(Request $request) {
		Guilda::create([
        		'nome'				=> $request->nome,
        		'administrador_id'	=>	$request->administrador_id,
				'game_id'				=> $request->game_nome
      ]);
      $persona = Persona::find($request->administrador_id);
      $guilda = \feederation\Guilda::where('nome', $request->nome)->first();
		$persona->guilda_id = $guilda->id;
		//$persona->cargo;
		$persona->update();
		return redirect("/home");
	}
	public function criarGuilda(Request $request){
		return view('/criarGuilda', ['id' => $request->id]);
	}
	
	public function verMinhasGuildas(){
		$personas = \feederation\Persona::where('usuario_id', Auth::user()->id)->get();
		$guildas = collect();
		foreach($personas as $persona){	
			$guilda = \feederation\Guilda::where('administrador_id' ,$persona->id)->get();
			$guildas = $guildas->merge($guilda);
		}		
		return view('/verGuilda', ['guildas' => $guildas]);	
	}
						 
	public function verPerfilGuilda(Request $request){
		return view('/home');
		$membros = \feederation\Persona::where('guilda_id', $request->guilda_id)->get();		
		return view('/perfilGuilda', ['membros' => $membros, 'nome' => $request->nome]);	
	
	}
	

}
