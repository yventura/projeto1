<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComercioFixo extends Model
{
    protected $table = 'comercio_fixo';
    protected $fillable = [
         'data', 'valor_cf_01', 'valor_cf_02', 'valor_cf_03', 'valor_cf_04', 'valor_cf_05', 'valor_cf_06', 'valor_cf_07', 'valor_cf_08', 'valor_cf_09'
    ];
}
