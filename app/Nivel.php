<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'users_niveis';
    protected $fillable = [
        'nome', 'permissoes'
    ];

//    public function Desc08($desc_08){
//
//        switch ($desc_08)
//        {
//            case 1:
//                echo "Triagem -";
//                break;
//
//            case 2:
//                echo "Pesquisa -";
//                break;
//
//            case 3:
//                echo "Infração -";
//                break;
//        }
//    }
}
