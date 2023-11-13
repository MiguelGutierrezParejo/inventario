<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    //protected $table = 'equipos';

    protected $casts = [
        'FechaAlta' => 'date:dd/mm/YYYY',
        'FechaBaja' => 'date:dd/mm/YYYY',
    ];

    protected $fillable = ['IdTipo', 'Fabricante', 'Modelo', 'NumSerie', 'FechaAlta', 'FechaBaja', 'Observaciones'];

    /* public function scopeIdTipo($query, $IdTipo)
    {
        if($IdTipo)
            return $query->where('IdTipo', 'LIKE', "%$IdTipo%");
    }

    public function scopeFabricante($query, $Fabricante)
    {
        if($Fabricante)
            return $query->where('Fabricante', 'LIKE', "%$Fabricante%");
    }

    public function scopeModelo($query, $Modelo)
    {
        if($Modelo)
            return $query->where('Modelo', 'LIKE', "%$Modelo%");
    }

    public function scopeNumSerie($query, $NumSerie)
    {
        if($NumSerie)
            return $query->where('NumSerie', 'LIKE', "%$NumSerie%");
    }

    public function scopeFechaAlta($query, $FechaAlta)
    {
        if($FechaAlta)
            return $query->where('FechaAlta', 'LIKE', "%$FechaAlta%");
    }

    public function scopeFechaBaja($query, $FechaBaja)
    {
        if($FechaBaja)
            return $query->where('FechaBaja', 'LIKE', "%$FechaBaja%");
    } */

    public function tipo(){
        return $this->belongsTo(Tipoequipo::class, 'IdTipo');
    }

    public function mantenimientos(){

        return $this->hasMany(Mantenimientoequipo::class, 'IdEquipo', 'Id');

    }

    public function relaciones(){

        return $this->hasMany(Relacionequipo::class, 'IdEquipo', 'Id');

    }

    public function relacionesequipos(){

        return $this->hasMany(S_relacionequipossoftware::class, 'IdEquipo', 'Id');

    }
}

