<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use feederation\Solicitacao_de_Amizade;
use feederation\Amigo;
use Auth;

class AmigoController extends Controller
{
	
	public function procurarAmigo(Request $request){
		$personas = \feederation\Persona::where('nome', $request->nome)->get();
		return view ('procurarAmigo', ['error' => FALSE,'personas'=> $personas]);	
	}
	
	public function adicionarAmigo(Request $request){
		$solicitacoes = \feederation\Solicitacao_de_Amizade::where
							('personaDestino_id', Auth::user()->personaPadrao)->where
							('personaRemetente_id',$request->persona_id)->get(); 		
		if($solicitacoes->count() > 0) {
			$personas = \feederation\Persona::where('nome', $request->nome)->get();
			return view('/procurarAmigo',['error' => TRUE, 'personas' => $personas]);
		}
		else{
			Solicitacao_de_Amizade::create([
        			'personaDestino_id'		=> $request->persona_id,
        			'personaRemetente_id'	=> Auth::user()->personaPadrao,
        			'confirmacao'				=>	FALSE,
      	]);
			return redirect('/home');
		}
	}
	
	
	public function listarAmigos(Request $request){
		$amigos = \feederation\Amigo::where('persona_id',Auth::user()->personaPadrao)->get();
		return view ('listarAmigos', ['amigos'=> $amigos]);
	}
	
	public function aceitarSolicitacao(Request $request){
		$solicitacoes = \feederation\Solicitacao_de_Amizade::find($request->solicitacao_id)->delete();
		Amigo::create([
        		'persona_id'				=> $request->persona_id,
        		'personaAmigo_id'			=> Auth::user()->personaPadrao,
      ]);
      Amigo::create([
        		'persona_id'				=> Auth::user()->personaPadrao,
        		'personaAmigo_id'			=> $request->persona_id,
      ]);
      return redirect('\home');
	}
}
