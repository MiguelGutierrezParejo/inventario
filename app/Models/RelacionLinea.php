<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelacionLinea extends Model
{
    use HasFactory;

    protected $table = 'relacionlineas';

    protected $fillable = ['Nombre', 'Observaciones','FechaAlta', 'FechaBaja'];


    protected $casts = [
        'FechaAlta' => 'date:d-m-Y',
        'FechaBaja' => 'date:d-m-Y',
    ];

    public function linea(){

        return $this->belongsTo(Linea::class, 'IdLinea');
        
    }

    public function usuario(){

        return $this->belongsTo(Usuario::class, 'IdUsuario');
        
    }
}
