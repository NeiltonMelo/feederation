<?php

namespace feederation;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'conteudo', 'persona_id', 'guilda_id', 'titulo', 'temImagem'
    ];	
   public function persona_id() {
   	return $this->hasOne('/Persona');
    
   }
   public function guilda_id() {
   	return $this->hasOne('/Guilda');	
	}   	
	   	
}
