<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\I_proveedor;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use DateTime;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class I_proveedoresController extends Controller
{

    public function index(){
        $proveedores = I_proveedor::all()->whereNull("FechaBaja");

        return view('i_proveedores.index', [
            'proveedores' => $proveedores,
        ]);
    }

    public function show($id){
        $proveedor = I_proveedor::findOrFail($id);

        $documentos = Documento::where('Tabla', 'Proveedor')->where('IdRelacionado', $id)->get();

        return view('i_proveedores.show', [
            'proveedor' => $proveedor,
            'documentos' => $documentos, 
        ]);
    }


    public function create()
    {
        $proveedor = new I_proveedor();

        return view('i_proveedores.create', [
            'proveedor' => $proveedor,
        ]);
    }

    private function validar()
    {

        $validados = request()->validate([
            'Nombre' => 'required',
            'Telefono' => 'nullable',
            'Correo' => 'nullable',
            'Cif' => 'nullable',
            'FechaAlta' => 'nullable|date_format:Y-m-d',
            'FechaBaja' => 'nullable|date_format:Y-m-d',
            'Observaciones' => 'nullable|max:255',
            'Descuento' => 'nullable',
            'Iva' => 'nullable',
        ]);


        return $validados;
    }

    public function store()
    {
        $validados = $this->validar();

        $proveedor = new I_proveedor();

        $proveedor->Nombre = $validados['Nombre'];
        $proveedor->Telefono = $validados['Telefono'];
        $proveedor->Correo = $validados['Correo'];
        $proveedor->Cif = $validados['Cif'];
        $proveedor->FechaAlta = new DateTime($validados['FechaAlta']);


        if ($validados['FechaBaja']) {
            $proveedor->FechaBaja = new DateTime($validados['FechaBaja']);
            }
        $proveedor->Observaciones = $validados['Observaciones'];
        $proveedor->Descuento = $validados['Descuento'];
        $proveedor->Iva = $validados['Iva'];

        $proveedor->save();

        
        return redirect('/proveedores')->with('success', 'Proveedor creado con éxito.');
    }

    public function edit($id)
    {
        $proveedor = I_proveedor::findOrFail($id);

        
        return view('i_proveedores.edit', [
            'proveedor' => $proveedor,

        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $proveedor = I_proveedor::findOrFail($id);


        $FechaBaja = null;
        if ($validados['FechaBaja']) {
            $FechaBaja = new DateTime($validados['FechaBaja']);
        }


        DB::table('i_proveedores')
        ->where('Id', $id)
        ->update(['Nombre' => $validados['Nombre'], 'Telefono' => $validados['Telefono'], 'Correo' => $validados['Correo'], 'Cif' => $validados['Cif'],
         'FechaAlta' => new DateTime($validados['FechaAlta']), 'FechaBaja' => $FechaBaja, 'Observaciones' => $validados['Observaciones'], 'Descuento' => $validados['Descuento'],
         'Iva' => $validados['Iva']]);

        return redirect()->route('proveedores' ,$proveedor->Id)->with('success', 'Proveedor editado con éxito.');

    }

}