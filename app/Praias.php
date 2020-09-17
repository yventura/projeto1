<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Praias extends Model
{
    protected $table = 'praias';
    protected $fillable = [
        'data', 'localidade', 'cadeiras', 'animais', 'bicicletas', 'churrasco', 'guardasol', 'camping', 'vistoriadas', 'irregulares', 'covid'
    ];

    public function Localidade($localidade){
        if($localidade == 1){
            return "Pitangueiras";
        } else if($localidade == 2){
            return "Astúrias";
        } else{
            return "Enseada";
        }

    }
}
