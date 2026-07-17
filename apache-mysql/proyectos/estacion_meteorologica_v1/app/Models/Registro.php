<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registros';
    protected $fillable = [
        'temperatura',
        'humedad'
    ];
}
