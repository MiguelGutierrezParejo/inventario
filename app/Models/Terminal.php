<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory;

    protected $table = 'terminales';

    protected $casts = [
        'FechaAlta' => 'date:dd/mm/YYYY',
        'FechaBaja' => 'date:dd/mm/YYYY',
    ];

    protected $fillable = ['Id', 'Marca', 'Modelo', 'Imei', 'FormatoTarjeta', 'FechaAlta', 'FechaBaja', 'Observaciones'];

    /* public function scopeTitular($query, $Titular)
    {
        if($Titular)
            return $query->where('Titular', 'LIKE', "%$Titular%");
    }

    public function scopeMarca($query, $Marca)
    {
        if($Marca)
            return $query->where('Marca', 'LIKE', "%$Marca%");
    }

    public function scopeModelo($query, $Modelo)
    {
        if($Modelo)
            return $query->where('Modelo', 'LIKE', "%$Modelo%");
    } */

    public function terminales(){

        return $this->hasMany(RelacionTerminal::class, 'IdTerminal','Id');

    }

    public function lineas(){
        return $this->hasMany(Linea::class, 'IdTerminal', 'Id');
    }
}
