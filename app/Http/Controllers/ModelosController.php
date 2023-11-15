<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Modelo;
use Illuminate\Support\Facades\DB;

class ModelosController extends Controller
{

    public function index(){

        $modelos = Modelo::all();

        return view('modelos.index', [
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
            'Observaciones' => 'nullable|max:255',
        ]);

        return $validados;
    }

    public function store()
    {
        $validados = $this->validar();

        $modelo = new Modelo();

        $modelo->Modelo = $validados['Modelo'];
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
            'Observaciones' => $validados['Observaciones'],
        ]);

        return redirect('modelos/'. $modelo->Id)->with('success', 'Modelo editado con éxito.');
    }
}
