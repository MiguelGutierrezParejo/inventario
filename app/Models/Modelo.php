<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{

    protected $table = 'modelos';

    protected $fillable = ['Nombre', 'Observaciones'];

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'IdModelo', 'Id');
    }

}
