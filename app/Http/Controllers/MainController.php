<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use feederation\Post;
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
    	$posts = \feederation\Post::all();
		return view('home', ['posts' =>$posts]);    
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
