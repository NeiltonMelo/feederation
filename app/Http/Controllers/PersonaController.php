<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use feederation\Persona;
use Validator;

class PersonaController extends Controller
{
	public function escolherPersona(Resquest $request){
		
		return view ('escolherPersona', ['id'=>$request->id]);	
	}	
	
	function personaEscolhida(Request $request){
		$persona= \feederation\Persona::where('id',$request->get('id'))->first();
		return view('home', ['persona_id'=>$request->id, 'usuario_id' => $persona->usuario_id]);	 
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
		return redirect("/main/loginEfetuado/");
    	
    	
		
	}
	
	public function criarPersona(Request $request){
		return view('criarPersona', ['id'=>$request->id]);
	}

}
