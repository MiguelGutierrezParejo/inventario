<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $casts = [
        'FechaAlta' => 'date:d-m-Y',
        'FechaBaja' => 'date:d-m-Y',
    ];

    public function scopeNombre($query, $Nombre)
    {
        if($Nombre)
            return $query->where('Nombre', 'LIKE', "%$Nombre%");
    }

    public function scopeDepartamento($query, $Departamento)
    {
        if($Departamento)
            return $query->where('Departamento', 'LIKE', "%$Departamento%");
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
    }

    public function equipos(){

        return $this->hasMany(Relacionequipo::class, 'IdUsuario','Id');

    }

    public function terminales(){

        return $this->hasMany(RelacionTerminal::class, 'IdUsuario','Id');

    }

    public function lineas(){

        return $this->hasMany(RelacionLinea::class, 'IdUsuario','Id');

    }

    public function impresoras(){

        return $this->hasMany(I_impresora::class, 'IdUsuario', 'Id');

    }

    public function relaciones(){

        return $this->hasMany(S_relacionusuariossoftware::class, 'IdUsuario', 'Id');

    }

}
