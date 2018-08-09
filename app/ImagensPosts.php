<?php

namespace feederation;

use Illuminate\Database\Eloquent\Model;

class ImagensPosts extends Model
{	
	 protected $fillable = [
        'caminho'
    ];
	
	 public function persona_id() {
   	  return $this->hasOne('/Persona');   
   }	 
	 
    public function getURL(){
        return url('storage/uploads/posts/'.$this->caminho);
    }
}
