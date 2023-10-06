<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class I_proveedor extends Model
{
    use HasFactory;

    protected $table = 'i_proveedores';

    protected $fillable = ['Nombre', 'Telefono', 'Correo', 'FechaAlta', 'FechaBaja', 'Observaciones', 'Descuento'];

    protected $casts = [
        'FechaAlta' => 'date:dd/mm/YYYY',
        'FechaBaja' => 'date:dd/mm/YYYY',
    ];

    public function pedidos(){

        return $this->hasMany(I_pedido::class, 'IdProveedor', 'Id');
        
    }

    public function softwares(){

        return $this->hasMany(S_software::class, 'IdProveedor', 'Id');
        
    }

}