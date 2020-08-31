<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComercioFixo extends Model
{
    protected $table = 'comercio_fixo';
    protected $fillable = [
         'data', 'vistoria_processos', 'vistoria_vre', 'viabilidade_vre', 'ciencia', 'intimacao', 'plantao_interno', 'atendimento_guiche', 'observacao'
    ];
}
