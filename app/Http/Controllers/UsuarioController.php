<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use feederation\User;
use Validator;

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
		return view('cadastrarUsuario');
    		
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
		return redirect("main/");
	}
		
	public function editarUsuario(Request $request){
		$user = \feederation\User::find($request->id);
		return view('editarUsuario',['user'=> $user]);	 
	}
	
			
	public function atualizarUsuario(Request $request){
		$user = \feederation\User::find($request->id);
		$user->nome = $request->nome;
		$user->sobrenome = $request->sobrenome;
		$user->email=$request->email;
		$user->update();
		return redirect("/listarUsuarios");
	}  
	
	public function remover(Request $request){
		$user = \feederation\User::find($request->id);
		$user->delete();
		return redirect("/listarUsuarios");
	}	


}