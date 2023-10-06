<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class I_impresora extends Model
{
    use HasFactory;


    protected $casts = [
        'FechaAlta' => 'date:dd/mm/YYYY',
        'FechaBaja' => 'date:dd/mm/YYYY',
    ];

    protected $fillable = ['IdModImpresora', 'IdUsuario', 'NumSerie', 'FechaAlta', 'FechaBaja', 'Observaciones'];

    public function usuario(){

        return $this->belongsTo(Usuario::class, 'IdUsuario');
        
    }

    public function modelo() {
        return $this->belongsTo(I_modeloimpresora::class, 'IdModImpresora');
    }

    public function mantenimientos() {

        return $this->hasMany(I_mantenimientoimpresora::class, 'IdImpresora', 'Id');
        
    }
}