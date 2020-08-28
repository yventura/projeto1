<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class StatusServiceProvider extends ServiceProvider
{
    public function nomeStatus($status){
        if($status == 0){
            return "Habilitado";
        } else {
            return "Desabilitado";
        }

    }

}
