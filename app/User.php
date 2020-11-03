<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password', 'prontuario', 'nivel', 'status' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function nomeNivel($nivel){

        switch ($nivel)
        {
            case 0:
                echo "Administrador";
                break;

            case 1:
                echo "Supervisor";
                break;

            case 2:
                echo "Padrão";
                break;
        }
    }
    public function nomeStatus($status){

        switch ($status)
        {
            case 0:
                echo "Habilitado";
                break;

            case 1:
                echo "Desabilitado";
                break;
        }
    }
}
