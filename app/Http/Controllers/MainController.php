<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use feederation\Post;
use feederation\Game;
use feederation\Guilda;
use feederation\Amigo;
use Auth;


class MainController extends Controller
{	 
	 	 
    function index(){
    	return view('login');    
    }
    
    function checarLogin(Request $request){
    	$this->validate($request, [
    		'email'				=>	'required|email',
    		'password'			=>	'required|alphaNum|min:3',
    	]);
    	
    	$dados_usuario = array(
			'email'				=>	$request->get('email'),
			'password'			=>	$request->get('password')
    	);
     	
    	
    	if(Auth::attempt($dados_usuario)){
    		$usuario = \feederation\User::where('email',$request->get('email'))->first();
    		
    		if($usuario->administrador == TRUE) {
    			return redirect('main/loginEfetuadoAdmin');
    		}
    		else{
    			if($usuario->personaPadrao == NULL){ 
					return redirect('escolherPersona');	
				}
				else {
					return redirect('/home'); 
				}
			}    	
    	}
    	else{
			return back()->with('error','Você Digitou Algo Errado');
    	}
    
    }
    
    function showHome() {
    	$persona = \feederation\Persona::find(Auth::user()->personaPadrao);
    	$sobrenomePersona = $persona->sobrenome;
    	$game = \feederation\Game::find($persona->game_id);
    	$guilda = \feederation\Guilda::find($persona->guilda_id);
		$nomeGuilda = "";		
		if($guilda != NULL) {    	
    		$nomeGuilda = $guilda->nome;
		}    	
    	$persona_game_nome = $game->nome;
    	$nomes = [];
    	$temGuilda = TRUE;
    	if($persona->guilda_id == NULL) {
    		$temGuilda = FALSE;  	    	
    	}
    	else {
    		$personas = \feederation\Persona::all();
    	
    		foreach($personas as $aux){
    			if($aux->guilda_id == NULL) {
					continue;    		
    			}
				if($aux->guilda_id == $persona->guilda_id) {
					array_push($nomes, $aux->nome . " " . $aux->sobrenome);	
				}  
				else {
					continue;
				}  	
    		}
    	}
    	$posts = \feederation\Post::where('persona_id', $persona->id)->get();
    	$amigos = \feederation\Amigo::where('persona_id',Auth::user()->personaPadrao)->get();
    	foreach($amigos as $amigo){
    		$postsaux = \feederation\Post::where('persona_id', $amigo->personaAmigo_id)->get();
    		$posts = $posts->merge($postsaux);
    	}
    	$posts2 = $posts->sortByDesc('created_at');
		return view('/home', ['nomeGuilda' => $nomeGuilda,
									'guilda'		=>	$guilda,
									'posts' => $posts2,
									'personaGameNome' => $persona_game_nome,
									'sobrenomePersona' => $sobrenomePersona,
									'membrosGuilda' => $nomes,
									'temGuilda' => $temGuilda]);    
    }	    
    
    function loginEfetuado() {
    	return view('loginEfetuado');
    }
    
    function loginEfetuadoAdmin() {
    	return view('loginEfetuadoAdmin');
    }
    
    function sair() {
		Auth::logout();
		return redirect('main');    
    }
    
}
