<?php

namespace App\Models;

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{

    protected $table = 'contratos';
    
    protected $casts = [
        'Fecha' => 'date:d-m-Y',
    ];

    protected $fillable = ['Nombre', 'Adjudicativos', 'Fecha', 'Observaciones', 'Estado'];

}
