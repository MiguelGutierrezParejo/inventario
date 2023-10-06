<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class I_modeloimpresora extends Model
{
    use HasFactory;

    protected $fillable = ['Marca', 'Modelo', 'Observaciones'];

    public function impresoras(){

        return $this->hasMany(I_impresora::class, 'IdModImpresora', 'Id');
        
    }

    public function relaciones(){

        return $this->hasMany(I_relacionconsumible::class, 'IdModelo', 'Id');
        
    }
}