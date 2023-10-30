<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class S_relacionusuariossoftware extends Model
{
    use HasFactory;

    protected $table = 's_relacionusuariossoftwares';

    protected $fillable = ['IdSoftware', 'IdUsuario'];

    protected $casts = [
        'FechaAlta' => 'date:d-m-Y',
        'FechaBaja' => 'date:d-m-Y',
    ];

    public function software(){

        return $this->belongsTo(S_software::class, 'IdSoftware');

    }

    public function usuario(){

        return $this->belongsTo(Usuario::class, 'IdUsuario');

    }


}
