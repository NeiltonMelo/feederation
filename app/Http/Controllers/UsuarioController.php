<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use feederation\User;
use Validator;
use Input;
use Auth;

class UsuarioController extends Controller
{

   
	public function checarEmail(Request $request){
		$this->validate($request, [
    		'email'				=>	'required|email',
    	]);
    	
		$dados_email = array(
			'email'				=>	$request->get('email'),		
		);  	
    	$rules = array('email' => 'unique:users,email');

		$validator = Validator::make($dados_email, $rules);

		if ($validator->fails()) {	
   		return back()->with('error','Este e-mail já está em uso');
		}
		else {
   	 	return view('cadastrarUsuario');
		}
    	
		
    		
	}
	   
   public function cadastrarUsuario(Request $request) {
		User::create([
        		'nome'				=> $request->nome,
        		'sobrenome'			=> $request->sobrenome,
        		'administrador'	=>	FALSE,
        		'sexo'				=>	$request->sexo,
        		'nascimento'		=>	$request->nascimento,
        		'email'				=>	$request->email,
        		'password'			=>	bcrypt($request->password),
      ]);
      $user = \feederation\User::where('email',$request->get('email'))->first();
      $_POST['id'] = $user->id;
		return view('criarPersona');
	}
		
	public function editarUsuario(Request $request){
		
		$user = \feederation\User::find($request->id);
		return view('editarUsuario',['user'=> $user]);	 
	}
	
			
	public function atualizarUsuario(Request $request){
		$this->validate($request, [
    		'email'				=>	'required|email',
    		'nome'				=>	'required',
    		'sobrenome'			=>	'required'
    	]);
		$user = \feederation\User::find($request->id);
		$user->nome = $request->nome;
		$user->sobrenome = $request->sobrenome;
		$user->email=$request->email;
		$user->update();
		return redirect("/home");
	}  
	
	public function remover(Request $request){
		$user = \feederation\User::find($request->id);
		$user->delete();
		return redirect("/listarUsuarios");
	}
	
	public function procurarGuilda(Request $request){
		$guildas = \feederation\Guilda::All();		
		return view('/procurarGuilda', ['guildas' => $guildas]);	
	}
	
	public function solicitacoes() {
		$solicitacoes = \feederation\Solicitacao_de_Amizade::where('personaDestino_id', Auth::user()->personaPadrao)->get(); 	
		return view("/solicitacoesAmizade",['solicitacoes' => $solicitacoes]);
	}	
	
	public function solicitacoesGuildas() {
		$solicitacoes = \feederation\Solicitacao_de_Guilda::where('persona_id', Auth::user()->personaPadrao)
																		->where('confirmacaoGuilda',TRUE)->get(); 	
		return view("/solicitacoesGuildas",['solicitacoes' => $solicitacoes]);
	}	
	
	public function aceitarSolicitacaoGuilda(Request $request){
		$solicitacao = \feederation\Solicitacao_de_Guilda::find($request->solicitacao_id);
		$persona = \feederation\Persona::find(Auth::user()->personaPadrao);
		$solicitacoes = \feederation\Solicitacao_de_Guilda::where('persona_id',$persona->id)->get();
		$persona->guilda_id = $solicitacao->guilda_id;
		$persona->update();
		$solicitacao->delete();
		foreach($solicitacoes as $solicit){
			$solicit->delete();
		}
      return redirect('\home');
	}
	
	public function procurarGuilda(Request $request){
		$persona
		$guildas = \feederation\Guilda::where('nome', '!=',$request->nome);
		return view('/procurarGuilda',['nome' => $request->nome,'guildas' => $guildas,'error' => FALSE]);
	}
	
	public function solicitacaoMembro(Request $request){
		$persona = \feederation\Persona::find(Auth::user()->personaPadrao);	
		$guilda = \feederation\Guilda::find($persona->guilda_id);
		$solicitacoes = \feederation\Solicitacao_de_Guilda::where
							('persona_id', $request->persona_id)->where
							('guilda_id',$persona->guilda_id)->get();
		if($solicitacoes->count() > 0) {
			$personas = \feederation\Persona::where('guilda_id', '!=',Auth::user()->guilda_id)
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


}