<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class S_software extends Model
{
    use HasFactory;

    protected $table = 's_softwares';

    protected $casts = [
        'FechaAlta' => 'date:dd/mm/YYYY',
        'FechaBaja' => 'date:dd/mm/YYYY',
    ];

    protected $fillable = ['IdDistribuidor', 'Nombre', 'Cantidad', 'Tipo', 'Documento', 'FechaAlta', 'FechaBaja', 'Alta', 'Observaciones'];

    public function proveedor(){

        return $this->belongsTo(I_proveedor::class, 'IdProveedor');
        
    }

    public function relaciones(){

        return $this->hasMany(S_relacionusuariossoftware::class, 'IdSoftware', 'Id');
        
    }

    public function relacionesequipos(){

        return $this->hasMany(S_relacionequipossoftware::class, 'IdSoftware', 'Id');
        
    }




}