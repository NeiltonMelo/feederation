<?php

namespace feederation;

use Illuminate\Database\Eloquent\Model;

class Solicitacao_de_Guilda extends Model
{
    protected $fillable = [
        'persona_id','guilda_id','confirmacaoGuilda','confirmacaoUsuario'
    ];
}
