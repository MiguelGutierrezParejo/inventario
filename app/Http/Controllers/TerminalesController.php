<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Relaciontelefono;
use App\Models\RelacionTerminal;
use App\Models\Terminal;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TerminalesController extends Controller
{
    public function index()
    {
        $ordenes = ['NInventario', 'Nombre', 'Marca', 'Modelo', 'FechaAlta', 'FechaBaja', 'PrecioAdquisicion'];
        $orden = request()->query('orden') ?: 'Nombre';
        abort_unless(in_array($orden, $ordenes), 404);

        if (request('dir') == 'desc') {
            $objeto = DB::table('terminales')->leftJoin('relacionterminales', 'terminales.id', '=', 'relacionterminales.IdTerminal')
                                     ->leftJoin('usuarios', 'relacionterminales.IdUsuario', '=', 'usuarios.id')->select('terminales.*', 'usuarios.Nombre')
                                     ->whereNull('relacionterminales.FechaBaja')->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                                     ->where('Marca', 'LIKE', '%'.request('Marca').'%')->where('Modelo', 'LIKE', '%'.request('Modelo').'%')
                                     ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                                     ->where('PrecioAdquisicion', 'LIKE', '%'.request('PrecioAdquisicion').'%')
                                     ->where('terminales.FechaAlta', 'LIKE', '%'.request('FechaAlta').'%')->whereNull('terminales.FechaBaja')
                                     ->orderByDesc($orden)->get();
        } else {
            $objeto = DB::table('terminales')->leftJoin('relacionterminales', 'terminales.id', '=', 'relacionterminales.IdTerminal')
                                     ->leftJoin('usuarios', 'relacionterminales.IdUsuario', '=', 'usuarios.id')->select('terminales.*', 'usuarios.Nombre')
                                     ->whereNull('relacionterminales.FechaBaja')->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                                     ->where('Marca', 'LIKE', '%'.request('Marca').'%')->where('Modelo', 'LIKE', '%'.request('Modelo').'%')
                                     ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                                     ->where('PrecioAdquisicion', 'LIKE', '%'.request('PrecioAdquisicion').'%')
                                     ->where('terminales.FechaAlta', 'LIKE', '%'.request('FechaAlta').'%')->whereNull('terminales.FechaBaja')
                                     ->OrderBy($orden)->get();
        }

        $pulsado = "Mostrar Todo";

        return view('terminales.index', [
            'objeto' => $objeto,
            'total' => Terminal::all()->count(),
            'pulsado' => $pulsado,
        ]);

    }

    public function index2()
    {
        $ordenes = ['NInventario', 'Nombre', 'Marca', 'Modelo', 'FechaAlta', 'FechaBaja', 'PrecioAdquisicion'];
        $orden = request()->query('orden') ?: 'Nombre';
        abort_unless(in_array($orden, $ordenes), 404);

        if (request('dir') == 'desc') {
            $objeto = DB::table('terminales')->leftJoin('relacionterminales', 'terminales.id', '=', 'relacionterminales.IdTerminal')
                                     ->leftJoin('usuarios', 'relacionterminales.IdUsuario', '=', 'usuarios.id')->select('terminales.*', 'usuarios.Nombre')
                                     ->whereNull('relacionterminales.FechaBaja')
                                     ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                                     ->where('Marca', 'LIKE', '%'.request('Marca').'%')
                                     ->where('Modelo', 'LIKE', '%'.request('Modelo').'%')
                                     ->where('PrecioAdquisicion', 'LIKE', '%'.request('PrecioAdquisicion').'%')
                                     ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                                     ->orderByDesc($orden)->get();
        } else {
            $objeto = DB::table('terminales')->leftJoin('relacionterminales', 'terminales.id', '=', 'relacionterminales.IdTerminal')
                                     ->leftJoin('usuarios', 'relacionterminales.IdUsuario', '=', 'usuarios.id')->select('terminales.*', 'usuarios.Nombre')
                                     ->whereNull('relacionterminales.FechaBaja')->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                                     ->where('Marca', 'LIKE', '%'.request('Marca').'%')->where('Modelo', 'LIKE', '%'.request('Modelo').'%')
                                     ->where('PrecioAdquisicion', 'LIKE', '%'.request('PrecioAdquisicion').'%')->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                                     ->OrderBy($orden)->get();
        }

        $pulsado = "Mostrar solo Altas";

        return view('terminales.index', [
            'objeto' => $objeto,
            'total' => Terminal::all()->count(),
            'pulsado' => $pulsado,
        ]);

    }

    public function indexetiquetar($Tipo)
    {
        $ordenes = ['NInventario', 'Nombre', 'Marca', 'Modelo', 'FechaAlta', 'FechaBaja', 'PrecioAdquisicion'];
        $orden = request()->query('orden') ?: 'Nombre';
        abort_unless(in_array($orden, $ordenes), 404);

        if (request('dir') == 'desc') {
            $objeto = DB::table('terminales')->leftJoin('relacionterminales', 'terminales.id', '=', 'relacionterminales.IdTerminal')
                                     ->leftJoin('usuarios', 'relacionterminales.IdUsuario', '=', 'usuarios.id')->select('terminales.*', 'usuarios.Nombre')
                                     ->whereNull('relacionterminales.FechaBaja')->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                                     ->where('Marca', 'LIKE', '%'.request('Marca').'%')->where('Modelo', 'LIKE', '%'.request('Modelo').'%')
                                     ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                                     ->where('PrecioAdquisicion', 'LIKE', '%'.request('PrecioAdquisicion').'%')
                                     ->where('terminales.FechaAlta', 'LIKE', '%'.request('FechaAlta').'%')->whereNull('terminales.FechaBaja')
                                     ->orderByDesc($orden)->get();
        } else {
            $objeto = DB::table('terminales')->leftJoin('relacionterminales', 'terminales.id', '=', 'relacionterminales.IdTerminal')
                                     ->leftJoin('usuarios', 'relacionterminales.IdUsuario', '=', 'usuarios.id')->select('terminales.*', 'usuarios.Nombre')
                                     ->whereNull('relacionterminales.FechaBaja')->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                                     ->where('Marca', 'LIKE', '%'.request('Marca').'%')->where('Modelo', 'LIKE', '%'.request('Modelo').'%')
                                     ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                                     ->where('PrecioAdquisicion', 'LIKE', '%'.request('PrecioAdquisicion').'%')
                                     ->where('terminales.FechaAlta', 'LIKE', '%'.request('FechaAlta').'%')->whereNull('terminales.FechaBaja')
                                     ->OrderBy($orden)->get();
        }

        return view('terminales.indexetiquetar', [
            'objeto' => $objeto,
            'total' => Terminal::all()->count(),
        ]);

    }

    public function show($id){

        $terminal = Terminal::all()->firstWhere('Id', $id);
        $titular =  RelacionTerminal::OrderByDesc('Id')->where('IdTerminal', $id)->first();
        $relacion = RelacionTerminal::OrderBy('FechaAlta', 'desc')->where('IdTerminal', $id)->get();
        $documentos = Documento::where('Tabla', 'Terminal')->where('IdRelacionado', $id)->get();

        return view('terminales.show', [
            'terminal' => $terminal,
            'titular' => $titular,
            'relacion' => $relacion,
            'documentos' => $documentos,
        ]);
    }

    public function create()
    {
        $terminal = new Terminal();
        return view('terminales.create', [
            'terminal' => $terminal,
        ]);
    }

    public function store()
    {
        $validados = $this->validar();

        //Para crear NInventario
        $ultimo = Terminal::all()->sortByDesc('Id')->first();
        $ninventarioultimo = $ultimo->NInventario;
        $stringSeparado = explode('-', $ninventarioultimo);
        $ninventario = $stringSeparado[1] + 1;
        $numeroconpatron = str_pad($ninventario, 6, "0", STR_PAD_LEFT);
        $ninventariofinal = 'T-' . $numeroconpatron;

        $terminal = new Terminal();

        $terminal->NInventario = $ninventariofinal;
        $terminal->Marca = $validados['Marca'];
        $terminal->Modelo = $validados['Modelo'];
        $terminal->NumSerie = $validados['NumSerie'];
        $terminal->Imei = $validados['Imei'];
        $terminal->FormatoTarjeta = $validados['FormatoTarjeta'];
        $terminal->Cuenta = $validados['Cuenta'];
        $terminal->FechaAlta = new DateTime($validados['FechaAlta']);
        if ($validados['FechaBaja']) {
            $terminal->FechaBaja = new DateTime($validados['FechaAlta']);
            }
        $terminal->Observaciones = $validados['Observaciones'];
        $terminal->PrecioAdquisicion = $validados['PrecioAdquisicion'];

        $terminal->save();

        DB::select('INSERT INTO relacionterminales (IdTerminal, IdUsuario, FechaAlta) VALUES ( ?, 0, ?)', [$terminal->id, $terminal->FechaAlta]);
        
        return redirect('/terminales')->with('success', 'Terminal creado con éxito.');
    }


    public function edit($id)
    {
        $terminal = Terminal::findOrFail($id);
        
        return view('terminales.edit', [
            'terminal' => $terminal,

        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $terminal = Terminal::findOrFail($id);

        $FechaAlta = new DateTime($validados['FechaAlta']);
        $FechaBaja = null;
        if ($validados['FechaBaja']) {
            $FechaBaja = new DateTime($validados['FechaAlta']);
            }

        DB::select('UPDATE terminales SET Marca = ?, Modelo = ?, NumSerie = ?, Imei = ?, FormatoTarjeta = ?, Cuenta = ?, FechaAlta = ?, FechaBaja = ?,Observaciones = ?, PrecioAdquisicion = ? 
                    WHERE id = ?', [$validados['Marca'], $validados['Modelo'], $validados['NumSerie'],
                    $validados['Imei'], $validados['FormatoTarjeta'], $validados['Cuenta'], $FechaAlta, $FechaBaja, $validados['Observaciones'], $validados['PrecioAdquisicion'], $id]);

        return redirect('/terminales/'.$terminal->Id)->with('success', 'Terminal actualizado.');
    }

    private function validar()
    {
        $validados = request()->validate([
            
            'Marca' => 'required|max:255',
            'Modelo' => 'required|max:255',
            'NumSerie' => 'nullable|max:255',
            'Imei' => 'required|max:255',
            'FormatoTarjeta' => 'nullable|max:255',
            'Cuenta' => 'nullable|max:255',
            'FechaAlta' => 'required|date_format:Y-m-d',
            'FechaBaja' => 'nullable|date_format:Y-m-d',
            'Observaciones' => 'nullable|max:255',
            'PrecioAdquisicion' => 'required',
        ]);

        return $validados;
    }

    public function recabar()
    {
        $titulares = ['No', 'Si'];

        return view('terminales.recabar', [
            'titulares' => $titulares,
        ]);
    }

    public function generar(Request $request)
    {
        
        if($request->Hasta == null) {
            $request->Hasta = Carbon::now();
        } 
        
        $altas = Terminal::select('*')
            ->where('FechaAlta', '<=', $request->Hasta)
            ->whereNull('FechaBaja')
            ->orWhere(function ($query) use ($request) {
                $query->where('FechaAlta', '<', $request->Hasta )
                    ->where('FechaBaja', '>', $request->Hasta);
            })
            ->get();

        //$altas2 = $altas->where('FechaAlta', '<=', $request->Hasta);

        $bajas = Terminal::select('*')
            ->whereBetween('FechaBaja', [$request->Desde, $request->Hasta])
            ->get();

        $pdf = Pdf::loadView('terminales.generar', [
            'terminalAlta' => $altas,
            'terminalBaja' => $bajas,
            'request' => $request,
            'titular' => $request->titular,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream(); 
        
    }

    
}
