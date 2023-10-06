<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimientoequipo extends Model
{
    use HasFactory;

    protected $casts = [
        'FechaAlta' => 'date:dd/mm/YYYY',
        'FechaBaja' => 'date:dd/mm/YYYY',
    ];

    protected $fillable = ['Nombre','Observaciones','FechaAlta', 'FechaBaja', 'Fabricante', 'NumSerie', 'Caracteristicas'];


    public function equipo(){

        return $this->belongsTo(Equipo::class, 'IdEquipo');
        
    }
}
