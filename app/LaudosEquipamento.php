<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaudosEquipamento extends Model
{
    protected $fillable = [
        'id', 'laudo_id', 'equipamentos'
    ];
}
