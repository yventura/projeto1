<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noturno extends Model
{
    protected $table = 'fisc_noturna';
    protected $fillable = [
        'data', 'paralisacao_evento', 'atendimento_denuncia', 'comercio_ambulante', 'atendimento_processos'
    ];
}
