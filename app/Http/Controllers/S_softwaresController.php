<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\I_proveedor;
use App\Models\S_software;
use DateTime;
use Illuminate\Support\Facades\DB;


class S_softwaresController extends Controller
{

    public function index(){

        $softwares = S_software::all()->sortBy('Nombre');

        return view('s_softwares.index', [
            'softwares' => $softwares,
        ]);
    }

    public function show($id){

        $software = S_software::findOrFail($id);
        $relacionesusuarios = $software->relaciones->filter(function ($relacion) {
            return $relacion->FechaBaja === null;
        });
        $relacionesequipos = $software->relacionesequipos->filter(function ($relacion) {
            return $relacion->FechaBaja === null;
        });
        $documentos = Documento::where('Tabla', 'Software')->where('IdRelacionado', $id)->OrderByDesc('created_at')->get();

        return view('s_softwares.show', [
            'software' => $software,
            'relacionesusuarios' => $relacionesusuarios,
            'relacionesequipos' => $relacionesequipos,
            'documentos' => $documentos
        ]);
    }

    public function edit($id)
    {
        $software = S_software::findOrFail($id);
        $proveedores = I_proveedor::all()->sortBy("Nombre")->whereNull("FechaBaja");

        return view('s_softwares.edit', [
            'software' => $software,
            'proveedores' => $proveedores,

        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $software = S_software::findOrFail($id);

        $FechaBaja = null;
        if ($validados['FechaBaja']) {
            $FechaBaja = new DateTime($validados['FechaBaja']);
        }

        $idproveedor = I_proveedor::where('Nombre', $validados['Proveedor'])->first();

        DB::table('s_softwares')
        ->where('id', $id)
        ->update(['IdProveedor' => $idproveedor->Id, 'Nombre' => $validados['Nombre'], 'Cantidad' => $validados['Cantidad'],
         'Tipo' => $validados['Tipo'], 'FechaAlta' => new DateTime($validados['FechaAlta']), 'FechaBaja' => $FechaBaja, 'Observaciones' => $validados['Observaciones'], 'PrecioAdquisicion' => $validados['PrecioAdquisicion']]);

        // Actualizar relaciones con usuarios si la fecha de baja ha cambiado
        if ($FechaBaja && $software->FechaBaja != $FechaBaja) {
            $software->relaciones()->update(['FechaBaja' => $FechaBaja]);
        }

        // Actualizar relaciones con equipos si la fecha de baja ha cambiado
        if ($FechaBaja && $software->FechaBaja != $FechaBaja) {
            $software->relacionesequipos()->update(['FechaBaja' => $FechaBaja]);
        }

        return redirect()->route('softwares' ,$software->Id)->with('success', 'Software editado con éxito.');
    }

    private function validar()
    {
        $validados = request()->validate([
            'Proveedor' => 'required',
            'Nombre' => 'required',
            'Cantidad' => 'required',
            'Tipo' => 'required',
            'FechaAlta' => 'required|date_format:Y-m-d',
            'FechaBaja' => 'nullable|date_format:Y-m-d',
            'Observaciones' => 'nullable|max:255',
            'PrecioAdquisicion' => 'nullable',
        ]);

        return $validados;
    }

    public function create()
    {
        $software = new S_software();

        $proveedores = I_proveedor::all()->whereNull("FechaBaja");

        return view('s_softwares.create', [
            'software' => $software,
            'proveedores' => $proveedores,
        ]);
    }

    public function store()
    {
        $validados = $this->validar();
        $software = new S_software();
        $idproveedor = I_proveedor::where('Nombre', $validados['Proveedor'])->first();

        $software->IdProveedor = $idproveedor->Id;
        $software->Nombre = $validados['Nombre'];
        $software->Cantidad = $validados['Cantidad'];
        $software->Tipo = $validados['Tipo'];
        $software->FechaAlta = new DateTime($validados['FechaAlta']);
        if ($validados['FechaBaja']) {
            $software->FechaBaja = new DateTime($validados['FechaBaja']);
        }
        $software->Observaciones = $validados['Observaciones'];
        $software->PrecioAdquisicion = $validados['PrecioAdquisicion'];

        $software->save();

        return redirect('/softwares')->with('success', 'Software creado con éxito.');
    }
}
