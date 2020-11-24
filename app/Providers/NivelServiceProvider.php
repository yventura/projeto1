<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class NivelServiceProvider extends ServiceProvider
{
    public function nomeNivel($nivel){
        if($nivel == 0){
            return "Administrador";
        } else if($nivel == 1){
            return "Supervisor";
        } else {
            return "Padrão";
        }

    }

}
