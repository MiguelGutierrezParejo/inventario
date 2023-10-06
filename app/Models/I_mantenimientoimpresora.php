<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class I_mantenimientoimpresora extends Model
{
    use HasFactory;

    protected $fillable = ['IdImpresora', 'IdConsumible', 'Fecha',  'Observaciones'];

    protected $casts = [
        'Fecha' => 'date:dd/mm/YYYY',
    ];

    public function impresora(){
        return $this->belongsTo(I_impresora::class, 'IdImpresora');
    }

    public function consumible(){
        return $this->belongsTo(I_consumible::class, 'IdConsumible', 'Id');
    }
}