<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relacionequipo extends Model
{
    use HasFactory;

    protected $table = 'relacionequipos';

    protected $fillable = ['Nombre','Observaciones','FechaAlta', 'FechaBaja'];

    
    protected $casts = [
        'FechaAlta' => 'date:d-m-Y',
        'FechaBaja' => 'date:d-m-Y',
    ];
    
    public function equipo(){

        return $this->belongsTo(Equipo::class, 'IdEquipo');
        
    }

    public function usuario(){

        return $this->belongsTo(Usuario::class, 'IdUsuario');
        
    }

    
}
