<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Modelo;
use DateTime;
use Illuminate\Support\Facades\DB;

class ModelosController extends Controller
{

    public function index(){

        $modelos = Modelo::all()->where('FechaBaja', null)->sortBy('Modelo');

        return view('modelos.index', [
            'modelos' => $modelos,
        ]);
    }

    public function index2(){

        $modelos = Modelo::all()->sortBy('Modelo');

        return view('modelos.index2', [
            'modelos' => $modelos,
        ]);
    }

    public function show($id){

        $modelo = Modelo::findOrFail($id);
        $fotos = Foto::where('IdModelo', $modelo->Id)->orderBy('orden')->get();

        return view('modelos.show', [
            'modelo' => $modelo,
            'fotos' => $fotos,
        ]);
    }

    public function create()
    {
        $modelo = new Modelo();

        return view('modelos.create', [
            'modelo' => $modelo,
        ]);
    }

    private function validar()
    {

        $validados = request()->validate([
            'Modelo' => 'required',
            'FechaAlta' => 'nullable|date_format:Y-m-d',
            'FechaBaja' => 'nullable|date_format:Y-m-d',
            'Observaciones' => 'nullable|max:255',
        ]);

        return $validados;
    }

    public function store()
    {
        $validados = $this->validar();

        $modelo = new Modelo();

        $modelo->Modelo = $validados['Modelo'];
        $modelo->FechaAlta = new DateTime($validados['FechaAlta']);
        if ($validados['FechaBaja']) {
            $modelo->FechaBaja = new DateTime($validados['FechaBaja']);
        }
        $modelo->Observaciones = $validados['Observaciones'];

        $modelo->save();

        return redirect('/modelos')->with('success', 'Modelo creado con éxito.');
    }

    public function edit($id)
    {
        $modelo = Modelo::findOrFail($id);

        return view('modelos.edit', [
            'modelo' => $modelo,
        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $modelo = Modelo::findOrFail($id);

        DB::table('modelos')
        ->where('id', $id)
        ->update([
            'Modelo' => $validados['Modelo'],
            'FechaAlta' => new DateTime($validados['FechaAlta']),
            'FechaBaja' => $validados['FechaBaja'],
            'Observaciones' => $validados['Observaciones'],
        ]);

        return redirect('modelos/'. $modelo->Id)->with('success', 'Modelo editado con éxito.');
    }
}
