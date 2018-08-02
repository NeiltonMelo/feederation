<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
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
    		$admin = \feederation\User::where('email',$request->get('email'))->first();
    		
    		if($admin->administrador == TRUE) {
    			return redirect('main/loginEfetuadoAdmin');
    		}
    		else{
				return redirect('escolherPersona');	
			}    	
    	}
    	else{
			return back()->with('error','Você Digitou Algo Errado');
    	}
    
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
