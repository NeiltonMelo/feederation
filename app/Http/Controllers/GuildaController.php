<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use feederation\Guilda;

class GuildaController extends Controller
{
   public function inserirGuilda(Request $request) {
   	//$game_id = \feederation\Game::select('id')->where('nome', $request->game_nome)->get();
   	//$game_id = \feederation\Game::find($request->game_nome);
		Guilda::create([
        		'nome'				=> $request->nome,
        		'administrador_id'	=>	$request->administrador_id,
				'game_id'				=> $request->game_nome
      ]);
		return redirect("/main/loginEfetuado/");d
	}
	public function criarGuilda(Request $request){
		return view('criarGuilda', ['id'=>$request->id]);
	}
}
