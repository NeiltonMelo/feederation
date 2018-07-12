<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use feederation\Usuario;

class UsuarioController extends Controller
{

	public function listar(Request $request){
		$usuario = \feederation\Usuario::All();
		return view ('listarUsuarios', ['usuario'=> $usuario]);	
	}
   
	public function prepararAdicionar(Request $request){
		return view('cadastrarUsuario');
	}
	   
   public function adicionar(Request $request) {
		$usuario = new \feederation\Usuario();
		$usuario->nome = $request->nome;
		$usuario->sobrenome = $request->sobrenome;
		$usuario->sexo = $request->sexo;
		$usuario->email = $request->email;
		$usuario->nascimento = $request->nascimento;		
		$usuario->tipoUsuario = FALSE;
		return redirect("listar/usuario/");
	}
		
	public function editar(Request $request){
		$usuario = \feederation\Usuario::find($request->id);
		return view('editarUsuario',['usuario'=> $usuario]);	 
	}
	
			
	public function atualizar(Request $request){
		$usuario = \feederation\Usuario::find($request->id);
		$usuario->nome = $request->nome;
		$usuario->sobrenome = $request->sobrenome;
		$usuario->email=$request->email;
		$usuario->update();
		return redirect("/listar/usuarios");
	}  
	
	public function remover(Request $request){
		$usuario = \feederation\Usuario::find($request->id);
		$usuario->delete();
		return redirect("/listar/usuarios");
	}	


}