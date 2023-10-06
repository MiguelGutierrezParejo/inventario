<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class I_consumible extends Model
{
    use HasFactory;

    protected $fillable = ['Modelo', 'Referecia', 'Páginas', 'Precio', 'Cantidad', 'Stock', 'Bajas', 'Observaciones'];

    public function mantenimientos() {
        return $this->hasMany(I_mantenimientoimpresora::class, 'IdConsumible', 'Id');       
    }

    public function relaciones() {
        return $this->hasMany(I_relacionconsumible::class, 'IdConsumible', 'Id');       
    }

    public function detalles() {
        return $this->hasMany(I_detallespedido::class, 'IdConsumible', 'Id');       
    }

}