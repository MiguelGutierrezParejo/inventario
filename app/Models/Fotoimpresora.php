<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotoimpresora extends Model
{
    use HasFactory;

    protected $table = 'fotosimpresoras';

    protected $fillable = ['Foto', 'Orden'];

    public function modeloimpresora(){

        return $this->belongsTo(I_modeloimpresora::class, 'IdModelo');

    }
}
