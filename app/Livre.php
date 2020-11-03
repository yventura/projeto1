<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Livre extends Model
{
    protected $table = 'feira_livre';
    protected $fillable = [
        'data', 'desc_01', 'valor_fl_02', 'valor_fl_03', 'valor_fl_04', 'valor_fl_05', 'valor_fl_06', 'desc_06', 'valor_fl_07'
    ];

    public function Desc01($desc_01)
    {
        switch ($desc_01) {
            case 1:
                echo "R. dos Bandeirantes - Vila Rã";
                break;

            case 2:
                echo "R. Ceará - Jd Santence";
                break;

            case 3:
                echo "R. Helena Correa dos Santos - Vila Zilda";
                break;

            case 4:
                echo "R. Bidu Sayão - Perequê";
                break;

            case 5:
                echo "R. Rubens de Sá - Jd Progresso";
                break;

            case 6:
                echo "Av. Miguel Alonso Gonzalez - Jd Las Palmas";
                break;

            case 7:
                echo "R. Romão Salgado - Vila Julia";
                break;

            case 8:
                echo "Av. do Bosque - Pernambuco ";
                break;

            case 9:
                echo "R. Carmosina de Freitas - Sta. Cruz dos Navegantes";
                break;

            case 10:
                echo "R. Afonso Nunes - Jd Boa Esperança";
                break;

            case 11:
                echo "R. Manoel Domingos Cravo - Sta Rosa";
                break;

            case 12:
                echo "Av. Odilon Maximiliano dos Santos - Morrinhos II";
                break;

            case 13:
                echo "Alameda das Palmas - Sto Antonio";
                break;

            case 14:
                echo "R. Argentina - Jd Praiano";
                break;

            case 15:
                echo "R. Tambaú - Parque Estuário VC";
                break;

            case 16:
                echo "Av. Atlantica - Enseada";
                break;

            case 17:
                echo "Av. Santos Dumont - Monteiro da Cruz";
                break;
        }
    }

    public function Desc06($desc_06)
    {
        switch ($desc_06) {
            case 1:
                echo "Vistorias -";
                break;

            case 2:
                echo "Ciências -";
                break;

            case 3:
                echo "Plantão -";
                break;
        }
    }
}
