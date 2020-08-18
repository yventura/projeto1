<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComercioFixo extends Model
{
    protected $fillable = [
        'id', 'data', 'vistoria_processos', 'vistoria_vre', 'viabilidade_vre', 'ciencia', 'intimacao', 'atendimento_guiche', 'observacao'
    ];
}
