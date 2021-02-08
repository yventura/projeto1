<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Null_;

class ComercioAmbulante extends Model
{
    protected $table = 'comercio_ambulante';
    protected $fillable = [
        'data', 'valor_ca_01', 'valor_ca_02', 'valor_ca_03', 'valor_ca_04', 'valor_ca_05', 'valor_ca_06', 'valor_ca_07', 'valor_ca_08', 'valor_ca_09'
    ];
}
