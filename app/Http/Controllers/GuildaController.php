<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use feederation\Guilda;

class GuildaController extends Controller
{
   public function inserirGuilda(Request $request) {
		Guilda::create([
        		'nome'				=> $request->nome,
        		'administrador_id'	=>	$request->administrador_id,
				'game_id'				=> $request->game_nome
      ]);
		return redirect("/main/loginEfetuado/");
	}
	public function criarGuilda(Request $request){
		return view('/criarGuilda', ['id' => $request->id]);
	}
}
