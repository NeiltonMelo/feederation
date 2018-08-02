<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use feederation\Persona;
use feederation\Game;
use Validator;
use Auth;

class PersonaController extends Controller
{
	
    public function escolherPersona(){
		$id = Auth::user()->id;
    	$personas = \feederation\Persona::where('usuario_id',$id)->get();
		return view ('/escolherPersona', ['personas' => $personas]);	
	 }	
	
	function personaEscolhida(Request $request){
		return view('/home', ['persona_id'=>$request->id]);	 
	}
	
	
	public function inserirPersona(Request $request) {
		$this->validate($request, [
    		'nome'				=>	'required',
    		'sobrenome'			=>	'required',
    		'sexo'				=>	'required',
    		'nascimento'		=>	'required',
    	]);
    	Persona::create([
        		'nome'					=> $request->nome,
        		'sobrenome' 			=> $request->sobrenome,
        		'sexo'					=> $request->sexo,
        		'nascimento'			=> $request->nascimento,
        		'game_id'				=> $request->game_nome,
        		'usuario_id'			=>	$request->usuario_id
     	 ]);
     	$game = \feederation\Game::find($request->game_nome);
     	$game->numeroUsuarios++;
     	$game->update();
		return redirect("/main/loginEfetuado/");
    	
    	
		
	}
	
	public function criarPersona(Request $request){
		return view('criarPersona', ['id'=>$request->id]);
	}

}
