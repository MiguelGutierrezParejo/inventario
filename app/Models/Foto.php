<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = ['Foto'];

    public function equipo(){

        return $this->belongsTo(Equipo::class, 'IdEquipo');
        
    }
}
