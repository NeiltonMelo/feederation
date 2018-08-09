<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use feederation\Guilda;
use feederation\Persona;
use feederation\Solicitacao_de_Guilda;
use Auth;
use Input;

class GuildaController extends Controller
{
   public function inserirGuilda(Request $request) {
   	$persona = \feederation\Persona::find(Auth::user()->personaPadrao);
		Guilda::create([
        		'nome'				=> $request->nome,
        		'administrador_id'	=>	$persona->id,
				'game_id'				=> $persona->game_id
      ]);
      $guilda = \feederation\Guilda::where('nome', $request->nome)->first();
		$persona->guilda_id = $guilda->id;
		//$persona->cargo;
		$persona->update();
		return redirect("/home");
	}
	public function criarGuilda(Request $request){
		return view('/criarGuilda');
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
		$persona = \feederation\Persona::find(Auth::user()->personaPadrao);
		$membros = \feederation\Persona::where('guilda_id', $persona->guilda_id)->get();		
		return view('/perfilGuilda', ['guilda_id'=>$request->guilda_id,'membros' => $membros, 'nome' => $request->nome]);	
	
	}
	public function sairGuilda(){
		$persona = \feederation\Persona::find(Auth::user()->personaPadrao);
		$persona->guilda_id = NULL;
		if($persona->cargosGuilda != NULL) {
			$persona->cargosGuilda = NULL;
		}
		$persona->update();	
		return redirect('/home');
	}

		
	
	public function adicionarMembro(Request $request){
		$personas = \feederation\Persona::where('guilda_id', '!=',$request->guilda_id)
												->orWhereNull('guilda_id')->get();
		return view('/adicionarMembro',['nome' => $request->nome,'personas' => $personas,'error' => FALSE]);
	}
	
	public function solicitacaoMembro(Request $request){
		$persona = \feederation\Persona::find(Auth::user()->personaPadrao);	
		$guilda = \feederation\Guilda::find($persona->guilda_id);
		$solicitacoes = \feederation\Solicitacao_de_Guilda::where
							('persona_id', $request->persona_id)->where
							('guilda_id',$persona->guilda_id)->get();
		if($solicitacoes->count() > 0) {
			$personas = \feederation\Persona::where('guilda_id', '!=',$request->guilda_id)
												->orWhereNull('guilda_id')->get();
			return view('/adicionarMembro',['error' => TRUE, 'personas' => $personas,'nome'=>$guilda->nome]);
		}
		else{
			Solicitacao_de_Guilda::create([
        			'persona_id'				=> $request->persona_id,
        			'guilda_id'					=> $guilda->id,
        			'confirmacaoGuilda'		=>	TRUE,
        			'confirmacaoUsuario'		=>	FALSE,
      	]);
			return redirect('/home');
		}
	}
	
	public function aceitarSolicitacaoGuilda(){
		$solicitacoes = \feederation\Solicitacao_de_Guilda::find($request->solicitacao_id)->delete();
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
	
	public function solicitacoesPersonas(Request $request) {
		$persona = \feederation\Persona::find(Auth::user()->personaPadrao);
		$guilda = \feederation\Guilda::find($persona->guilda_id);
		$solicitacoes = \feederation\Solicitacao_de_Guilda::where('guilda_id', $persona->guilda_id)
																		->where('confirmacaoUsuario',TRUE)->get(); 	
		return view("/solicitacoesPersonas",['solicitacoes' => $solicitacoes,'nome' => $guilda->nome]);
	}	
	
	
	public function aceitarSolicitacaoPersona(Request $request){
		$solicitacao = \feederation\Solicitacao_de_Guilda::find($request->solicitacao_id);
		$persona = \feederation\Persona::find($solicitacao->persona_id);
		$solicitacoes = \feederation\Solicitacao_de_Guilda::where('persona_id',$persona->id)->get();
		$persona->guilda_id = $solicitacao->guilda_id;
		$persona->update();
		$solicitacao->delete();
		foreach($solicitacoes as $solicit){
			$solicit->delete();
		}
      return redirect('\home');
	}


}
