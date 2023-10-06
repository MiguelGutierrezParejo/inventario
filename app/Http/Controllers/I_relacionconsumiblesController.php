<?php

namespace App\Http\Controllers;

use App\Models\I_consumible;
use App\Models\I_modeloimpresora;
use App\Models\I_relacionconsumible;
use Illuminate\Support\Facades\DB;

class I_relacionconsumiblesController extends Controller
{

    public function create()
    {

        $relacion = I_relacionconsumible::all()->where('Id', 115);

        $relacion = new I_relacionconsumible();

        $modelos = I_modeloimpresora::all();

        $consumibles = I_consumible::all()->where('Bajas', 0);

        return view('i_relacionconsumibles.create', [
            'relacion' => $relacion,
            'modelos' => $modelos,
            'consumibles' => $consumibles,
        ]);
    }

    public function store()
    {
        $validados = $this->validar();

        $existerelacion = I_relacionconsumible::all()->where('IdModelo', $validados['Modelo'])->where('IdConsumible', $validados['Consumible'])->count();

        if ($existerelacion == 0) {
            $relacion = new I_relacionconsumible();

            $relacion->IdModelo = $validados['Modelo'];
            $relacion->IdConsumible = $validados['Consumible'];
    
            $relacion->save();
            
            return redirect('/modeloimpresoras ')->with('success', 'Relacion creada con éxito.');
        }

        return redirect('/relacionconsumibles/create ')->with('error', 'La relacion ya existe.');

    } 

    private function validar()
    {
        $validados = request()->validate([
            'Modelo' => 'required',
            'Consumible' => 'required',
        ]);

        return $validados;
    }
}
