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
        if($nivel == 0){
            return "Administrador";
        } else if($nivel == 1){
            return "Supervisor";
        } else {
            return "Padrão";
        }
    }
    public function nomeStatus($status){
        if($status == 0){
            return "Habilitado";
        } else {
            return "Desabilitado";
        }

    }
}
