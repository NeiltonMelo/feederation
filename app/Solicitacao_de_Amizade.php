<?php

namespace feederation;

use Illuminate\Database\Eloquent\Model;

class Solicitacao_de_Amizade extends Model
{
    protected $fillable = [
        'personaRemetente_id','confirmacao','personaDestino_id'
    ];
}
