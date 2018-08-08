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
			$guilda = \feederation\Guilda::where('id' ,$persona->guilda_id)->get();
			$guildas = $guildas->merge($guilda);
		}		
		return view('/verGuilda', ['guildas' => $guildas]);	
	}
						 
	public function verPerfilGuilda(Request $request){
		$persona = \feederation\Persona::find(Auth::user()->personaPadrao);
		$membros = \feederation\Persona::where('guilda_id', $persona->guilda_id)->get();		
		return view('/perfilGuilda', ['guilda_id'=>$request->guilda_id,'membros' => $membros, 'nome' => $request->nome]);	
	
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
	
	public function solicitacoesGuilda(){
		$solicitacoes;
	}


}
