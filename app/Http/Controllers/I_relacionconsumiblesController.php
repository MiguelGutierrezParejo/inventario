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
            'Modelo' => 'nullable',
            'Consumible' => 'nullable',
            'Observaciones' => 'nullable|max:255'
        ]);

        return $validados;
    }

    public function edit($id)
    {
        $relacion = I_relacionconsumible::findOrFail($id);

        return view('i_relacionconsumibles.edit', [
            'relacion' => $relacion,
        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();

        $relacion = I_relacionconsumible::findOrFail($id);

        DB::select('UPDATE i_relacionconsumibles SET Observaciones = ?
                                               WHERE id = ?', [$validados['Observaciones'], $id]);

        return redirect('modeloimpresoras/' . $relacion->IdModelo)->with('success', 'Relación actualizada con éxito.');
    }

    public function destroy($id)
    {
        $relacion = I_relacionconsumible::findOrFail($id);

        $relacion->delete();

        DB::select('DELETE FROM i_relacionconsumibles WHERE id = ?', [$relacion->Id]);

        return redirect()->back()
            ->with('success', 'Consumible borrado correctamente');
    }
}
