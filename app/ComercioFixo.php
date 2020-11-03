<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComercioFixo extends Model
{
    protected $table = 'comercio_fixo';
    protected $fillable = [
         'data', 'valor_cf_01', 'valor_cf_02', 'valor_cf_03', 'valor_cf_04', 'valor_cf_05', 'valor_cf_06', 'valor_cf_07', 'valor_cf_08', 'desc_08', 'valor_cf_09', 'desc_09'
    ];

    public function Desc08($desc_08){

        switch ($desc_08)
        {
            case 1:
                echo "Triagem -";
                break;

            case 2:
                echo "Pesquisa -";
                break;

            case 3:
                echo "Infração -";
                break;
        }
    }

    public function Desc09($desc_09){
        if($desc_09 == 0){
            return "";
        } else{
            return "Ex_Oficio -";
        }
    }
}
