<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    use HasFactory;

    protected $casts = [
        'FechaAlta' => 'date:d-m-Y',
        'FechaBaja' => 'date:d-m-Y',
    ];

    public function lineas(){

        return $this->hasMany(RelacionLinea::class, 'IdLinea', 'Id');
    }

    public function terminal(){
        return $this->belongsTo(Terminal::class, 'IdTerminal');
    }
}
