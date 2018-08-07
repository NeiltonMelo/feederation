<?php

namespace feederation\Http\Controllers;

use Illuminate\Http\Request;
use feederation\Post;
use Auth;

class PostController extends Controller
{
    public function inserirPost(Request $request) {
		
    	Post::create([
        		'conteudo'				=> $request->conteudo,
        		'persona_id' 			=> $request->persona_id,
        		'guilda_id'				=> $request->guild_id,
     	 ]);
		return redirect("/home");
    	
    	
		
	}
	
	public function criarPost(){
		return view('criarPost');
	}
}
