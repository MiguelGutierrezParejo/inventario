<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class S_relacionequipossoftware extends Model
{
    use HasFactory;

    protected $table = 's_relacionequipossoftwares';

    protected $fillable = ['IdSoftware', 'IdEquipo'];

    public function software(){

        return $this->belongsTo(S_software::class, 'IdSoftware');
        
    }

    public function equipo(){

        return $this->belongsTo(Equipo::class, 'IdEquipo');
        
    }


}