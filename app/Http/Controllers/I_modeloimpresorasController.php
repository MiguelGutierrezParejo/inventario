<?php

namespace App\Http\Controllers;

use App\Models\Fotoimpresora;
use App\Models\I_consumible;
use App\Models\I_modeloimpresora;
use App\Models\I_relacionconsumible;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class I_modeloimpresorasController extends Controller
{
    public function index(){

        $ordenes = ['Id', 'Marca', 'Modelo'];
        $orden = request()->query('orden') ?: 'Id';
        abort_unless(in_array($orden, $ordenes), 404);

        if (request('dir') == 'desc') {
            $modeloimpresoras = DB::table('i_modeloimpresoras')
            ->select('i_modeloimpresoras.*')
            ->where('Id', 'LIKE', '%'.request('Id').'%')
            ->where('Marca', 'LIKE', '%'.request('Marca').'%')
            ->where('Modelo', 'LIKE', '%'.request('Modelo').'%')
            ->orderByDesc($orden)
            ->get();
        } else {
            $modeloimpresoras = DB::table('i_modeloimpresoras')
            ->select('i_modeloimpresoras.*')
            ->where('Id', 'LIKE', '%'.request('Id').'%')
            ->where('Marca', 'LIKE', '%'.request('Marca').'%')
            ->where('Modelo', 'LIKE', '%'.request('Modelo').'%')
            ->orderBy($orden)
            ->get();
        }

        $total = I_modeloimpresora::all()->count();

        return view('i_modeloimpresoras.index', [
            'modeloimpresoras' => $modeloimpresoras,
            'total' => $total,
        ]);
    }

    public function show($id){
        $modelo = I_modeloimpresora::all()->firstWhere('Id', $id);
        $fotos = Fotoimpresora::where('IdModelo', $modelo->Id)->orderBy('orden')->get();


        return view('i_modeloimpresoras.show', [
            'modelo' => $modelo,
            'fotos' => $fotos,
        ]);
    }

    public function create()
    {
        $modeloimpresora = new I_modeloimpresora();

        return view('i_modeloimpresoras.create', [
            'modeloimpresora' => $modeloimpresora,
        ]);
    }

    public function store()
    {
        $validados = $this->validar();

        $modeloimpresora = new I_modeloimpresora();

        $modeloimpresora->Marca = $validados['Marca'];
        $modeloimpresora->Modelo = $validados['Modelo'];
        $modeloimpresora->Observaciones = $validados['Observaciones'];

        $modeloimpresora->save();

        return redirect('/modeloimpresoras')->with('success', 'Modelo creado con éxito.');
    }

    public function formularioconsum($id)
    {
        $modeloimpresora = I_modeloimpresora::findOrFail($id);
        $consumibles = $consumibles = I_consumible::whereDoesntHave('relaciones', function ($query) use ($modeloimpresora) {
            $query->where('IdModelo', $modeloimpresora->Id);
        })->get();

        return view('i_modeloimpresoras.formularioconsum', [
            'modeloimpresora' => $modeloimpresora,
            'consumibles' => $consumibles
        ]);
    }

    public function agregarconsum(Request $request, $id)
    {
        $modeloimpresora = I_modeloimpresora::findOrFail($id);

        foreach ($request->input('relacion') as $consumibleId) {
            I_relacionconsumible::create([
                'IdModelo' => $modeloimpresora->Id,
                'IdConsumible' => $consumibleId,
            ]);
        }

        return redirect('/modeloimpresoras/'.$modeloimpresora->Id)->with('success', 'Relación de consumibles agregada correctamente');
    }

    private function validar()
    {

        $validados = request()->validate([
            'Marca' => 'required',
            'Modelo' => 'required',
            'Observaciones' => 'nullable',
        ]);

        return $validados;
    }

    public function edit($id)
    {
        $modeloimpresora = I_modeloimpresora::findOrFail($id);

        return view('i_modeloimpresoras.edit', [
            'modeloimpresora' => $modeloimpresora,
        ]);
    }

    public function update($id) {

        $validados = $this->validar();
        $modeloimpresora = I_modeloimpresora::findOrFail($id);

        DB::table('i_modeloimpresoras')
        ->where('id', $id)
        ->update(['Marca' => $validados['Marca'], 'Modelo' => $validados['Modelo'], 'Observaciones' => $validados['Observaciones']]);

        return redirect('/modeloimpresoras/'.$modeloimpresora->Id)->with('success', 'Modelo actualizado.');

    }

}
