<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use feederation\Game;

class GameController extends Controller
{
	public function inserirGame(Request $request){
		Game::create([
			'nome'							=> $request->nome,
  			'genero'							=> $request->genero,
  			'classificacaoIndicativa'	=>	$request->classificacaoIndicativa,
  			'lancamento'					=>	$request->lancamento,
  			'numeroUsuarios'				=>	0,
    	]);
		return redirect("main/");
	
	}
	public function cadastrarGame(Request $request) {
		return view('cadastrarGame');
	}
	
	public function listarGame(Request $request){
		$game = \feederation\Game::All();
		return view ('listarGame', ['game'=> $game]);	
	}

	public function remover(Request $request){
		$game = \feederation\Game::find($request->id);
		$game->delete();
		return redirect("/listarGame");
	}			    
}

