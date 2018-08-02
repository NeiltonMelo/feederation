<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use feederation\User;
use Validator;
use Input;

class UsuarioController extends Controller
{

	public function listarUsuarios(Request $request){
		$user = \feederation\User::All();
		return view ('listarUsuarios', ['user'=> $user]);	
	}
	
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
   	 	return view('/home');
		}
    }
	
   public function showCadastrarUsuario() {
    		return view('cadastrarUsuario');
	}
	   
   public function cadastrarUsuario(Request $request) {
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
   	 	
		User::create([
        		'nome'				=> $request->nome,
        		'sobrenome'			=> $request->sobrenome,
        		'administrador'	=>	FALSE,
        		'sexo'				=>	$request->sexo,
        		'nascimento'		=>	$request->nascimento,
        		'email'				=>	$request->email,
        		'password'			=>	bcrypt($request->password),
      ]);
		return view("/home");
		}
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
		return redirect("/main/loginEfetuado");
	}  
	
	public function remover(Request $request){
		$user = \feederation\User::find($request->id);
		$user->delete();
		return redirect("/listarUsuarios");
	}	


}