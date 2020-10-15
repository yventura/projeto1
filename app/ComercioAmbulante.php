<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Null_;

class ComercioAmbulante extends Model
{
    protected $table = 'comercio_ambulante';
    protected $fillable = [
        'data', 'valor_ca_01', 'valor_ca_02', 'valor_ca_03', 'desc_03', 'valor_ca_04', 'valor_ca_05', 'valor_ca_06', 'desc_06', 'valor_ca_07', 'desc_07', 'valor_ca_08', 'desc_08', 'valor_ca_09'
    ];

    public function Desc03($desc_03){
            if ($desc_03 == 0 or $desc_03 == null) {
                return " ";
            } else if ($desc_03 == 1) {
                return "Tendas -";
            } else if ($desc_03 == 2) {
                return "Camping -";
            } else {
                return "Churrasco -";
            }

    }

    public function Desc06($desc_06){
        if($desc_06 == 0 or $desc_06 == null){
            return " ";
        } else if($desc_06 == 1){
            return "Praias -";
        } else if($desc_06 == 2){
            return "VC -";
        }
    }

    public function Desc07($desc_07){
        if($desc_07 == 0 or $desc_07 == null){
            return " ";
        } else if($desc_07 == 1){
            return "Vistorias -";
        } else if($desc_07 == 2){
            return "Ciências -";
        } else {
            return "Apreensão -";
        }
    }

    public function Desc08($desc_08){
            if ($desc_08 == 0 or $desc_08 == null) {
                return " ";
            } else if ($desc_08 == 1) {
                return "Vistorias -";
            } else if ($desc_08 == 2) {
                return "Ciências -";
            } else {
                return "Apreensão -";
            }
        }
}
