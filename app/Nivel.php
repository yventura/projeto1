<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'users_niveis';
    protected $fillable = [
        'nome', 'permissoes'
    ];
}
