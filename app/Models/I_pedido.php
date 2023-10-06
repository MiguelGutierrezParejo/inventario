<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class I_pedido extends Model
{
    use HasFactory;

    protected $fillable = ['IdProveedor', 'Fecha', 'Importe', 'Finalizado'];

    public function proveedor(){
        return $this->belongsTo(I_proveedor::class, 'IdProveedor', 'Id');
    }

    public function detalles(){

        return $this->hasMany(I_detallespedido::class, 'IdPedido', 'Id');
        
    }

    public function recepciones(){
        return $this->hasMany(I_recepcionpedido::class, 'IdPedido', 'Id');
    }

}