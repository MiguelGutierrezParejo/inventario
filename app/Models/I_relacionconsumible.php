<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class I_relacionconsumible extends Model
{
    use HasFactory;

    protected $fillable = ['IdModelo', 'IdConsumible'];

    public function consumible(){
        return $this->belongsTo(I_consumible::class, 'IdConsumible', 'Id');
    }

    public function modelo(){
        return $this->belongsTo(I_modeloimpresora::class, 'IdModelo', 'Id');
    }
}
