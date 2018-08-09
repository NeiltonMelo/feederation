<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use feederation\Post;
use Auth;

class PostController extends Controller
{
    public function inserirPost(Request $request) {
		$user = Auth::user()->personaPadrao;
    	Post::create([
        		'conteudo'				=> $request->conteudo,
        		'titulo'					=> $request->titulo,
        		'persona_id' 			=> $user,
        		'guilda_id'				=> $request->guild_id,
     	 ]);
		return redirect("/home");
    	
    	
		
	}
	
	public function criarPost(){
		return view('criarPost');
	}
}
