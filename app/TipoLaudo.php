<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoLaudo extends Model
{
    protected $fillable = [
        'id', 'nome', 'sigla',
    ];
}
