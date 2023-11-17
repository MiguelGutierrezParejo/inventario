<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'contratos';

    protected $casts = [
        'Fecha' => 'date:d-m-Y',
    ];

    protected $fillable = ['Nombre', 'Adjudicatarios', 'NumExpediente', 'Fecha', 'Observaciones', 'Estado'];

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'IdContrato', 'Id');
    }

}
