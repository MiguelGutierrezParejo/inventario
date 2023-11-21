<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Linea;
use App\Models\RelacionLinea;
use App\Models\Terminal;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LineasController extends Controller
{

    public function index($tipo){

        $ordenes = ['NInventario', 'Nombre','Numero', 'Extension', 'IdTerminal', 'Caracteristicas'];
        $orden = request()->query('orden') ?: 'Nombre';
        abort_unless(in_array($orden, $ordenes), 404);

        if ($tipo == 'Simple') {
            if (request('dir') == 'desc') {
                $objeto = DB::table('lineas')->leftJoin('relacionlineas', 'lineas.id', '=', 'relacionlineas.IdLinea')
                                         ->leftJoin('usuarios', 'relacionlineas.IdUsuario', '=', 'usuarios.id')
                                         ->leftJoin('terminales', 'lineas.IdTerminal', '=', 'terminales.Id')
                                         ->select('lineas.*', 'usuarios.Nombre', 'terminales.Marca', 'terminales.Modelo as terminal_modelo')
                                         ->whereNull('relacionlineas.FechaBaja')
                                         ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                                         ->where('Numero', 'LIKE', '%'.request('Numero').'%')
                                         ->where('Extension', 'LIKE', '%'.request('Extension').'%')
                                         ->where('lineas.NInventario', 'LIKE', '%'.request('NInventario').'%')
                                         ->whereNull('lineas.FechaBaja')
                                         ->orderByDesc($orden)->get();
            } else {
                $objeto = DB::table('lineas')->leftJoin('relacionlineas', 'lineas.id', '=', 'relacionlineas.IdLinea')
                                         ->leftJoin('usuarios', 'relacionlineas.IdUsuario', '=', 'usuarios.id')
                                         ->leftJoin('terminales', 'lineas.IdTerminal', '=', 'terminales.Id')
                                         ->select('lineas.*', 'usuarios.Nombre', 'terminales.Marca', 'terminales.Modelo as terminal_modelo')
                                         ->whereNull('relacionlineas.FechaBaja')
                                         ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                                         ->where('Numero', 'LIKE', '%'.request('Numero').'%')
                                         ->where('Extension', 'LIKE', '%'.request('Extension').'%')
                                         ->where('lineas.NInventario', 'LIKE', '%'.request('NInventario').'%')
                                         ->whereNull('lineas.FechaBaja')
                                         ->OrderBy($orden)->get();
            }
        } else {
            if (request('dir') == 'desc') {
                $objeto = DB::table('lineas')->leftJoin('relacionlineas', 'lineas.id', '=', 'relacionlineas.IdLinea')
                                         ->leftJoin('usuarios', 'relacionlineas.IdUsuario', '=', 'usuarios.id')
                                         ->leftJoin('terminales', 'lineas.IdTerminal', '=', 'terminales.Id')
                                         ->select('lineas.*', 'usuarios.Nombre', 'terminales.Marca', 'terminales.Modelo as terminal_modelo')
                                         ->whereNull('relacionlineas.FechaBaja')
                                         ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                                         ->where('Numero', 'LIKE', '%'.request('Numero').'%')
                                         ->where('Extension', 'LIKE', '%'.request('Extension').'%')
                                         ->where('lineas.NInventario', 'LIKE', '%'.request('NInventario').'%')
                                         ->orderByDesc($orden)->get();
            } else {
                $objeto = DB::table('lineas')->leftJoin('relacionlineas', 'lineas.id', '=', 'relacionlineas.IdLinea')
                                         ->leftJoin('usuarios', 'relacionlineas.IdUsuario', '=', 'usuarios.id')
                                         ->leftJoin('terminales', 'lineas.IdTerminal', '=', 'terminales.Id')
                                         ->select('lineas.*', 'usuarios.Nombre', 'terminales.Marca', 'terminales.Modelo as terminal_modelo')
                                         ->whereNull('relacionlineas.FechaBaja')
                                         ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                                         ->where('Numero', 'LIKE', '%'.request('Numero').'%')
                                         ->where('Extension', 'LIKE', '%'.request('Extension').'%')
                                         ->where('lineas.NInventario', 'LIKE', '%'.request('NInventario').'%')
                                         ->OrderBy($orden)->get();
            }
        }
        return view('lineas.index', [
            'objeto' => $objeto,
            'total' => Linea::all()->count(),
            'tipo' => $tipo,
        ]);
    }

    public function show($id){

        $linea = Linea::all()->firstWhere('Id', $id);

        $terminal =  RelacionLinea::OrderByDesc('Id')->where('IdLinea', $id)->first();

        $relacion = RelacionLinea::OrderBy('FechaAlta', 'desc')->where('IdLinea', $id)->get();

        $documentos = Documento::where('Tabla', 'Linea')->where('IdRelacionado', $id)->get();

        return view('lineas.show', [
            'linea' => $linea,
            'terminal' => $terminal,
            'relacion' => $relacion,
            'documentos' => $documentos,
        ]);
    }

    public function create()
    {
        $linea = new Linea();
        return view('lineas.create', [
            'linea' => $linea,
        ]);
    }

    public function store()
    {
        $validados = $this->validar();

        //Para crear NInventario
        $ultimo = Linea::all()->sortByDesc('Id')->first();
        $ninventarioultimo = $ultimo->NInventario;
        $stringSeparado = explode('-', $ninventarioultimo);
        $ninventario = $stringSeparado[1] + 1;
        $numeroconpatron = str_pad($ninventario, 6, "0", STR_PAD_LEFT);
        $ninventariofinal = 'L-' . $numeroconpatron;

        $linea = new Linea();

        $linea->NInventario = $ninventariofinal;
        $linea->Numero = $validados['Numero'];
        $linea->Extension = $validados['Extension'];
        $linea->Pin = $validados['Pin'];
        $linea->Puk1 = $validados['Puk1'];
        $linea->Puk2 = $validados['Puk2'];
        $linea->NumTarjeta = $validados['NumTarjeta'];
        $linea->FechaAlta = new DateTime($validados['FechaAlta']);
        if ($validados['FechaBaja']) {
            $linea->FechaBaja = new DateTime($validados['FechaBaja']);
            }
        $linea->Observaciones = $validados['Observaciones'];

        $linea->save();

        DB::select('INSERT INTO relacionlineas (IdLinea, IdUsuario, FechaAlta) VALUES ( ?, 0, ?)', [$linea->id, $linea->FechaAlta]);

        return redirect('/lineasindex/Simple')->with('success', 'Línea creada con éxito.');
    }

    public function edit($id)
    {
        $linea = Linea::findOrFail($id);

        return view('lineas.edit', [
            'linea' => $linea,

        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $linea = Linea::findOrFail($id);

        $FechaAlta = new DateTime($validados['FechaAlta']);
        $FechaBaja = null;
        if ($validados['FechaBaja']) {
            $FechaBaja = new DateTime($validados['FechaBaja']);
        }

        DB::select('UPDATE lineas SET Numero = ?, Extension = ?, Pin = ?, Puk1 = ?, Puk2 = ?, NumTarjeta = ?,
                                      FechaAlta = ?, FechaBaja = ?, Observaciones = ? WHERE id = ?', [$validados['Numero'], $validados['Extension'], $validados['Pin'], $validados['Puk1'],
                            $validados['Puk2'], $validados['NumTarjeta'], $FechaAlta, $FechaBaja, $validados['Observaciones'], $id]);

        return redirect('/lineas/'.$linea->Id)->with('success', 'Linea actualizada.');
    }

    private function validar()
    {
        $validados = request()->validate([

            'Numero' => 'required|max:255',
            'Extension' => 'required|max:255',
            'Pin' => 'nullable|max:255',
            'Puk1' => 'nullable|max:255',
            'Puk2' => 'nullable|max:255',
            'NumTarjeta' => 'nullable|max:255',
            'FechaAlta' => 'required|date_format:Y-m-d',
            'FechaBaja' => 'nullable|date_format:Y-m-d',
            'Observaciones' => 'nullable|max:255',
        ]);

        return $validados;
    }

    public function recabar()
    {
        return view('lineas.recabar');
    }

    public function generar(Request $request)
    {

        if($request->Hasta == null) {
            $request->Hasta = Carbon::now();
        }

        $altas = Linea::select('*')
            ->where('FechaAlta', '<=', $request->Hasta)
            ->whereNull('FechaBaja')
            ->orWhere(function ($query) use ($request) {
                $query->where('FechaAlta', '<', $request->Hasta )
                    ->where('FechaBaja', '>', $request->Hasta);
            })
            ->get();

        //$altas2 = $altas->where('FechaAlta', '<=', $request->Hasta);

        $bajas = Linea::select('*')
            ->whereBetween('FechaBaja', [$request->Desde, $request->Hasta])
            ->get();

        $pdf = Pdf::loadView('lineas.generar', [
            'equipoAlta' => $altas,
            'equipoBaja' => $bajas,
            'request' => $request,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream();

    }
}
