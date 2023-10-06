<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class I_detallespedido extends Model
{
    use HasFactory;

    protected $fillable = ['IdPedido', 'IdConsumible', 'Cantidad',  'CantidadRecibida'];

    public function pedido(){
        return $this->belongsTo(I_pedido::class, 'IdPedido', 'Id');
    }

    public function consumible(){
        return $this->belongsTo(I_consumible::class, 'IdConsumible', 'Id');
    }

}