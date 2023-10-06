<?php

namespace App\Http\Controllers;

use App\Models\I_impresora;
use App\Models\I_mantenimientoimpresora;
use App\Models\I_consumible;
use App\Models\Mantenimientoequipo;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use DateTime;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class I_mantenimientoimpresorasController extends Controller
{
    public function index($dato = 'Id', $orden = 'asc')
    {

        if ($orden == 'desc') {
            $mantenimientos = I_mantenimientoimpresora::all()->sortByDesc($dato);
        } else {
            $mantenimientos = I_mantenimientoimpresora::all()->sortBy($dato);
        }

        return view('i_mantenimientoimpresoras.index', [
            'mantenimientos' => $mantenimientos,
        ]);
    }

    public function show($Id)
    {

        $mantenimiento = I_mantenimientoimpresora::where('Id', $Id)->first();

        return view('i_mantenimientoimpresoras.show', [
            'mantenimiento' => $mantenimiento,
        ]);
    }

    
    public function create($Id)
    {
        $mantenimiento = new  I_mantenimientoimpresora();

        $idimpresora = $Id;

        $relaciones = I_impresora::find($Id)->modelo->relaciones;
        
        return view('i_mantenimientoimpresoras.create', [
            'mantenimiento' => $mantenimiento,
            'relaciones' => $relaciones,
            'idimpresora' => $idimpresora,
        ]);
    }

    public function store()
    {
        $validados = $this->validar();
        $mantenimiento = new I_mantenimientoimpresora();

        $mantenimiento->IdImpresora = $validados['IdImpresora'];
        $mantenimiento->IdConsumible = $validados['IdConsumible'];
        $mantenimiento->Fecha = new DateTime( $validados['Fecha']);
        $mantenimiento->Observaciones = $validados['Observaciones'];

        DB::table('i_consumibles')
        ->where('Id', $mantenimiento->IdConsumible)
        ->decrement('Stock')
        ;
        
        $mantenimiento->save();

        return redirect('impresoras/'. $mantenimiento->IdImpresora)->with('success', 'Mantenimiento creado con éxito.');
    }

    private function validar()
    {

        $validados = request()->validate([
            
            'IdImpresora' => 'required',
            'IdConsumible' => 'required',
            'Fecha' => 'required',
            'Observaciones' => 'nullable|max:255',
        ]);

        return $validados;
    }

 

}
