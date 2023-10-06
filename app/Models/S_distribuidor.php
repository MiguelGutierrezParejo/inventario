<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class S_distribuidor extends Model
{
    use HasFactory;

    protected $table = 's_distribuidores';

    protected $fillable = ['Nombre', 'email', 'telefono','Alta'];

    public function softwares(){

        return $this->hasMany(S_software::class, 'IdDistribuidor', 'Id');
        
    }



}