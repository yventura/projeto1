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

        switch ($desc_03)
        {
            case 1:
                echo "Tendas -";
                break;

            case 2:
                echo "Camping -";
                break;

            case 3:
                echo "Churrasco -";
                break;
        }
    }

    public function Desc06($desc_06){

        switch ($desc_06)
        {
            case 1:
                echo "Praias -";
                break;

            case 2:
                echo "VC -";
                break;
        }
    }

    public function Desc07($desc_07){

        switch ($desc_07)
        {
            case 1:
                echo "Vistorias -";
                break;

            case 2:
                echo "Ciências -";
                break;

            case 3:
                echo "Apreensão -";
                break;
        }
    }

    public function Desc08($desc_08){

        switch ($desc_08)
        {
            case 1:
                echo "Vistorias -";
                break;

            case 2:
                echo "Ciências -";
                break;

            case 3:
                echo "Apreensão -";
                break;
        }
    }
}
