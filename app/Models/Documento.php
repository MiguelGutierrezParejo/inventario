<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $table = 'documentos';

    protected $casts = [
        'FechaAlta' => 'date:d-m-Y',
    ];

    protected $fillable = ['Tabla', 'IdRelacionado', 'Nombre', 'Fichero', 'FechaAlta', 'Observaciones'];
}
