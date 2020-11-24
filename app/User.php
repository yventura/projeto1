<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

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
        'name', 'email', 'password', 'prontuario', 'nivel', 'status', 'nivel_acesso'
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

    public function nomeNivel($id) {
        $niveis_acesso = DB::table('users_niveis')->get();

        foreach ($niveis_acesso as $nivel) {
            if ($nivel->id == $id) {
                echo $nivel->nome;
            }
        }
    }
    public function nomeStatus($status){

        switch ($status)
        {
            case 1:
                echo "Habilitado";
                break;

            case 0:
                echo "Desabilitado";
                break;
        }
    }
}
