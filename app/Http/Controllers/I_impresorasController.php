<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\I_consumible;
use App\Models\I_impresora;
use App\Models\I_mantenimientoimpresora;
use App\Models\I_modeloimpresora;
use App\Models\Usuario;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class I_impresorasController extends Controller
{
    public function index(Request $request, $tipo){

        $ordenes = ['NInventario', 'Id','Modelo', 'Nombre', 'NumSerie', 'FechaAdquisicion'];
        $orden = request()->query('orden') ?: 'Nombre';
        abort_unless(in_array($orden, $ordenes), 404);

        if ($tipo == 'Simple') {
            if (request('dir') == 'desc') {
                $impresoras = DB::table('i_impresoras')
                                ->leftJoin('i_modeloimpresoras', 'i_impresoras.IdModImpresora', '=', 'i_modeloimpresoras.id')
                                ->leftJoin('usuarios', 'i_impresoras.IdUsuario', '=', 'usuarios.id')
                                ->select('i_impresoras.*', 'usuarios.Nombre', 'i_modeloimpresoras.Modelo')
                                ->whereNull('i_impresoras.FechaBaja')
                                ->where('i_impresoras.Id', 'LIKE', '%'.request('Id').'%')
                                ->where('Modelo', 'LIKE', '%'.request('Modelo').'%')
                                ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                                ->where('NumSerie', 'LIKE', '%'.request('NumSerie').'%')
                                ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                                ->where('PrecioAdquisicion', 'LIKE', '%'.request('PrecioAdquisicion').'%')
                                ->orderByDesc($orden)
                                ->get();
            } else {
                $impresoras = DB::table('i_impresoras')->leftJoin('i_modeloimpresoras', 'i_impresoras.IdModImpresora', '=', 'i_modeloimpresoras.id')
                                ->leftJoin('usuarios', 'i_impresoras.IdUsuario', '=', 'usuarios.id')
                                ->select('i_impresoras.*', 'usuarios.Nombre', 'i_modeloimpresoras.Modelo')
                                ->whereNull('i_impresoras.FechaBaja')
                                ->where('i_impresoras.Id', 'LIKE', '%'.request('Id').'%')
                                ->where('Modelo', 'LIKE', '%'.request('Modelo').'%')
                                ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                                ->where('NumSerie', 'LIKE', '%'.request('NumSerie').'%')
                                ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                                ->where('PrecioAdquisicion', 'LIKE', '%'.request('PrecioAdquisicion').'%')
                                ->orderBy($orden)
                                ->get();
            }
        } else {
            if (request('dir') == 'desc') {
                $impresoras = DB::table('i_impresoras')
                                ->leftJoin('i_modeloimpresoras', 'i_impresoras.IdModImpresora', '=', 'i_modeloimpresoras.id')
                                ->leftJoin('usuarios', 'i_impresoras.IdUsuario', '=', 'usuarios.id')
                                ->select('i_impresoras.*', 'usuarios.Nombre', 'i_modeloimpresoras.Modelo')
                                ->where('i_impresoras.Id', 'LIKE', '%'.request('Id').'%')
                                ->where('Modelo', 'LIKE', '%'.request('Modelo').'%')
                                ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                                ->where('NumSerie', 'LIKE', '%'.request('NumSerie').'%')
                                ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                                ->where('PrecioAdquisicion', 'LIKE', '%'.request('PrecioAdquisicion').'%')
                                ->orderByDesc($orden)
                                ->get();
            } else {
                $impresoras = DB::table('i_impresoras')->leftJoin('i_modeloimpresoras', 'i_impresoras.IdModImpresora', '=', 'i_modeloimpresoras.id')
                                ->leftJoin('usuarios', 'i_impresoras.IdUsuario', '=', 'usuarios.id')
                                ->select('i_impresoras.*', 'usuarios.Nombre', 'i_modeloimpresoras.Modelo')
                                ->where('i_impresoras.Id', 'LIKE', '%'.request('Id').'%')
                                ->where('Modelo', 'LIKE', '%'.request('Modelo').'%')
                                ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                                ->where('NumSerie', 'LIKE', '%'.request('NumSerie').'%')
                                ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                                ->where('PrecioAdquisicion', 'LIKE', '%'.request('PrecioAdquisicion').'%')
                                ->orderBy($orden)
                                ->get();
            }
        }

        $total = I_impresora::all()->count();
        $mantenimientostotales = I_impresora::all();

        return view('i_impresoras.index', [
            'impresoras' => $impresoras,
            'total' => $total,
            'mantenimientostotales' =>$mantenimientostotales,
            'tipo' => $tipo,
        ]);
    }

    public function show($id){

        $impresoras = DB::table('i_impresoras')
                    ->leftJoin('i_modeloimpresoras', 'i_impresoras.IdModImpresora', '=', 'i_modeloimpresoras.id')
                    ->leftJoin('usuarios', 'i_impresoras.IdUsuario', '=', 'usuarios.id')
                    ->leftJoin('i_mantenimientoimpresoras', 'i_impresoras.Id', '=', 'i_mantenimientoimpresoras.IdImpresora')
                    ->select('i_impresoras.*', 'usuarios.Nombre', 'i_modeloimpresoras.Modelo', 'i_mantenimientoimpresoras.IdImpresora', 
                    'i_mantenimientoimpresoras.IdConsumible', 'i_mantenimientoimpresoras.Fecha', 'i_mantenimientoimpresoras.Observaciones as ObservacionesMantenimiento' )
                    ->where('i_impresoras.Id', $id)
                    ->orderBy('Fecha', 'desc')
                    ->get();

        $consumibles = I_consumible::all();

        $documentos = Documento::where('Tabla', 'Impresora')->where('IdRelacionado', $id)->get();

        $fechaactual = Carbon::now();
        $Añopasado = $fechaactual->subYear();

        return view('i_impresoras.show', [
            'consumibles' => $consumibles,
            'impresoras' => $impresoras,
            'impresora' => $impresoras->first(),
            'Añopasado' => $Añopasado,
            'documentos' => $documentos,
        ]);
    }

    public function create()
    {
        $impresora = new I_impresora();
        $modelos = I_modeloimpresora::all();
        $usuarios = Usuario::all();

        return view('i_impresoras.create', [
            'impresora' => $impresora,
            'modelos' => $modelos,
            'usuarios' => $usuarios,
        ]);
    }


    private function validar()
    {

        setcookie("Nombreusuario", request('Usuario'), time() + 1);
        setcookie("Modelo", request('Modelo'), time() + 1);

        $validados = request()->validate([
            'Modelo' => 'required',
            'Usuario' => 'required',
            'NumSerie' => 'required',
            'FechaAlta' => 'required|date_format:Y-m-d',
            'FechaBaja' => 'nullable|date_format:Y-m-d',
            'Observaciones' => 'nullable',
            'PrecioAdquisicion' => 'required',
        ]);

        return $validados;
    }

    public function store()
    {
        $validados = $this->validar();

        //Para crear NInventario
        $ultimo = I_impresora::all()->sortByDesc('Id')->first();
        $ninventarioultimo = $ultimo->NInventario;
        $stringSeparado = explode('-', $ninventarioultimo);
        $ninventario = $stringSeparado[1] + 1;
        $numeroconpatron = str_pad($ninventario, 6, "0", STR_PAD_LEFT);
        $ninventariofinal = 'I-' . $numeroconpatron;

        $impresora = new I_impresora();

        $impresora->NInventario = $ninventariofinal;
        $impresora->IdModImpresora = $validados['Modelo'];
        $impresora->IdUsuario = $validados['Usuario'];
        $impresora->NumSerie = $validados['NumSerie'];
        $impresora->FechaAlta = new DateTime($validados['FechaAlta']);

        if ($validados['FechaBaja']) {
            $impresora->FechaBaja = new DateTime($validados['FechaBaja']);
        }
        $impresora->Observaciones = $validados['Observaciones'];
        $impresora->PrecioAdquisicion = $validados['PrecioAdquisicion'];

        $impresora->save();
     
        return redirect('/impresorasindex/Simple')->with('success', 'Impresora creada con éxito.');
    }

    public function edit($id)
    {
        $impresora = I_impresora::findOrFail($id);
        $modelos = I_modeloimpresora::all()->sortBy("Modelo");
        $usuarios = Usuario::all()->sortBy("Nombre");
        
        return view('i_impresoras.edit', [
            'impresora' => $impresora,
            'modelos' => $modelos,
            'usuarios' => $usuarios,

        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $impresora = I_impresora::findOrFail($id);

        $FechaBaja = null;
        if ($validados['FechaBaja']) {
            $FechaBaja = new DateTime($validados['FechaBaja']);
        }

        DB::table('i_impresoras')
        ->where('id', $id)
        ->update(['IdModImpresora' => $validados['Modelo'], 'IdUsuario' => $validados['Usuario'], 'NumSerie' => $validados['NumSerie'],
        'NInventario' => $impresora->NInventario, 'Observaciones' => $validados['Observaciones'],'PrecioAdquisicion' => $validados['PrecioAdquisicion'],
        'FechaAlta' => new DateTime($validados['FechaAlta']), 'FechaBaja' => $FechaBaja]);

        return redirect('/impresoras/'.   $impresora->Id   )->with('success', 'Impresora actualizada.');
    }

    public function recabar()
    {     

        $mantenimientos = ['No', 'Si'];
        $titulares = ['No', 'Si'];

        return view('i_impresoras.recabar', [
            'mantenimientos' => $mantenimientos,
            'titulares' => $titulares,  
        ]);
    }

    public function generar(Request $request)
    {
        
        if($request->Hasta == null) {
            $request->Hasta = Carbon::now();
        } 
        
        $altas = I_impresora::select('*')
        ->where('FechaAlta', '<=', $request->Hasta)
        ->whereNull('FechaBaja')
        ->orWhere(function ($query) use ($request) {
            $query->where('FechaAlta', '<', $request->Hasta )
                ->where('FechaBaja', '>', $request->Hasta);
        })
        ->get();

        $bajas = I_impresora::select('*')
        ->whereBetween('FechaBaja', [$request->Desde, $request->Hasta])
        ->get();

        $mantenimientos = null;
        
        if ($request->mantenimiento == 'Si') {

            $mantenimientos = I_mantenimientoimpresora::select('*')
            ->where('Fecha', '<=', $request->Hasta)
            ->get();
        }

        $pdf = Pdf::loadView('i_impresoras.generar', [
            'impresoraAlta' => $altas,
            'impresoraBaja' => $bajas,
            'mantenimientos' => $mantenimientos,
            'request' => $request,
            'titular' => $request->titular, 
        ])->setPaper('a4', 'landscape');
        return $pdf->stream(); 
        
    }

    

}
