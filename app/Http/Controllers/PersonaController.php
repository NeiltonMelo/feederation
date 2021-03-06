<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use feederation\Persona;
use feederation\Game;
use feederation\User;
use Validator;
use Auth;

class PersonaController extends Controller
{
	
    public function escolherPersona(){
		$id = Auth::user()->id;
    	$personas = \feederation\Persona::where('usuario_id',$id)->get();
    	$nomes = [];
    	foreach($personas as $persona){
			$game = \feederation\Game::find($persona->game_id);    		
    		array_push($nomes, $game->nome);
    	}
		return view ('/escolherPersona', ['personas' => $personas,
													 'nomes' => $nomes ]);	
	 }	
	
	function personaEscolhida(Request $request){
		$id = Auth::user()->id;
		$persona = Persona::find($request->persona_id);
		$user = \feederation\User::find($id);
		$user->personaPadrao = $request->persona_id;
		$user->nome_persona = $persona->nome;
		$user->update();
		return redirect('/home');	 
	}
	
	
	public function inserirPersona(Request $request) {
		
    	$game = \feederation\Game::where('nome',$request->nomeGame)->first();
    	$id = Auth::user()->id;
    	Persona::create([
        		'nome'					=> $request->nome,
        		'sobrenome' 			=> $request->sobrenome,
        		'sexo'					=> $request->sexo,
        		'nascimento'			=> $request->nascimento,
        		'game_id'				=> $game->id,
        		'usuario_id'			=>	$id
     	 ]);
     	$game->numeroUsuarios++;
     	$game->update();
		return redirect("escolherPersona");
    	
    	
		
	}
	
	public function criarPersona(){
		$games = \feederation\Game::all();
		$nomes = [];
    	foreach($games as $game){  		
    		array_push($nomes, $game->nome);
    	}
		return view('criarPersona', ['games' => $games,
											  'nomes' => $nomes]);
	}

}
