<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelacionTerminal extends Model
{
    use HasFactory;

    protected $table = 'relacionterminales';

    protected $fillable = ['Nombre', 'Numero', 'Observaciones','FechaAlta', 'FechaBaja'];


    protected $casts = [
        'FechaAlta' => 'date:d-m-Y',
        'FechaBaja' => 'date:d-m-Y',
    ];

    public function terminal(){

        return $this->belongsTo(Terminal::class, 'IdTerminal');
        
    }

    public function usuario(){

        return $this->belongsTo(Usuario::class, 'IdUsuario');
        
    }
}
