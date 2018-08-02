<?php

namespace feederation;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'nome','genero','classificacaoIndicativa', 'lancamento', 'numeroUsuarios'
    ];
}
