<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Equipo;
use App\Models\I_impresora;
use App\Models\Mantenimientoequipo;
use App\Models\Relacionequipo;
use App\Models\Terminal;
use App\Models\Tipoequipo;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EquiposController extends Controller
{
    public function index()
    {
        $ordenes = ['NInventario', 'Nombre', 'IdTipo', 'NombreOrdenador', 'Modelo', 'FechaAlta', 'FechaBaja', 'PrecioAdquisicion'];
        $orden = request()->query('orden') ?: 'NombreOrdenador';
        abort_unless(in_array($orden, $ordenes), 404);

        $tipos = Tipoequipo::all();

        if (request('dir') == 'desc') {
            $objeto = DB::table('equipos')
                        ->leftJoin('relacionequipos', 'equipos.id', '=', 'relacionequipos.IdEquipo')
                        ->leftJoin('tipoequipos', 'equipos.IdTipo', '=', 'tipoequipos.id')
                        ->leftJoin('usuarios', 'relacionequipos.IdUsuario', '=', 'usuarios.id')
                        ->select('equipos.*', 'usuarios.Nombre', 'tipoequipos.Denominacion')
                        ->whereNull('relacionequipos.FechaBaja')
                        ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                        ->where('IdTipo', 'LIKE', '%'.request('IdTipo').'%')
                        ->where('Modelo', 'LIKE', '%'.request('Modelo').'%')
                        ->where('NombreOrdenador', 'LIKE', '%'.request('NombreOrdenador').'%')
                        ->where('PrecioAdquisicion', 'LIKE', '%'.request('PrecioAdquisicion').'%')
                        ->whereNull('equipos.FechaBaja')
                        ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                        ->OrderByDesc($orden)->get();
        } else {
            $objeto = DB::table('equipos')
                        ->leftJoin('relacionequipos', 'equipos.id', '=', 'relacionequipos.IdEquipo')
                        ->leftJoin('tipoequipos', 'equipos.IdTipo', '=', 'tipoequipos.id')
                        ->leftJoin('usuarios', 'relacionequipos.IdUsuario', '=', 'usuarios.id')
                        ->select('equipos.*', 'usuarios.Nombre', 'tipoequipos.Denominacion')
                        ->whereNull('relacionequipos.FechaBaja')
                        ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                        ->where('IdTipo', 'LIKE', '%'.request('IdTipo').'%')
                        ->where('Modelo', 'LIKE', '%'.request('Modelo').'%')
                        ->where('NombreOrdenador', 'LIKE', '%'.request('NombreOrdenador').'%')
                        ->where('PrecioAdquisicion', 'LIKE', '%'.request('PrecioAdquisicion').'%')
                        ->whereNull('equipos.FechaBaja')
                        ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                        ->OrderBy($orden)->get();
        }

        $pulsado = "Mostrar Todo";
        $total = $objeto->count();

        return view('equipos.index', [
            'objeto' =>  $objeto,
            'tipos' => $tipos,
            'total' => $total,
            'pulsado' => $pulsado,
        ]);
    }

    public function index2()
    {
        $ordenes = ['NInventario', 'Nombre', 'IdTipo', 'NombreOrdenador', 'Modelo', 'NumSerie', 'FechaAlta', 'FechaBaja', 'PrecioAdquisicion'];
        $orden = request()->query('orden') ?: 'NombreOrdenador';
        abort_unless(in_array($orden, $ordenes), 404);

        $tipos = Tipoequipo::all();

        if (request('dir') == 'desc') {
            $objeto = DB::table('equipos')
                        ->leftJoin('relacionequipos', 'equipos.id', '=', 'relacionequipos.IdEquipo')
                        ->leftJoin('tipoequipos', 'equipos.IdTipo', '=', 'tipoequipos.id')
                        ->leftJoin('usuarios', 'relacionequipos.IdUsuario', '=', 'usuarios.id')
                        ->select('equipos.*', 'usuarios.Nombre', 'tipoequipos.Denominacion')
                        ->whereNull('relacionequipos.FechaBaja')
                        ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                        ->where('IdTipo', 'LIKE', '%'.request('IdTipo').'%')
                        ->where('Modelo', 'LIKE', '%'.request('Modelo').'%')
                        ->where('NombreOrdenador', 'LIKE', '%'.request('NombreOrdenador').'%')
                        ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                        ->where('PrecioAdquisicion', 'LIKE', '%'.request('PrecioAdquisicion').'%')
                        ->where('equipos.FechaBaja','LIKE', request('FechaBaja'), 'or')
                        ->OrderByDesc($orden)->get();
        } else {
            $objeto = DB::table('equipos')
                        ->leftJoin('relacionequipos', 'equipos.id', '=', 'relacionequipos.IdEquipo')
                        ->leftJoin('tipoequipos', 'equipos.IdTipo', '=', 'tipoequipos.id')
                        ->leftJoin('usuarios', 'relacionequipos.IdUsuario', '=', 'usuarios.id')
                        ->select('equipos.*', 'usuarios.Nombre', 'tipoequipos.Denominacion')
                        ->whereNull('relacionequipos.FechaBaja')
                        ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                        ->where('IdTipo', 'LIKE', '%'.request('IdTipo').'%')
                        ->where('Modelo', 'LIKE', '%'.request('Modelo').'%')
                        ->where('NombreOrdenador', 'LIKE', '%'.request('NombreOrdenador').'%')
                        ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                        ->where('PrecioAdquisicion', 'LIKE', '%'.request('PrecioAdquisicion').'%')
                        ->where('equipos.FechaBaja', 'LIKE', request('FechaBaja'), 'or')
                        ->OrderBy($orden)->get();
        }

        $pulsado = "Mostrar solo Altas";

        return view('equipos.index', [
            'objeto' =>  $objeto,
            'tipos' => $tipos,
            'total' => Equipo::all()->count(),
            'pulsado' => $pulsado,
        ]);
    }

    //index con equipos, terminales e impresoras   
    public function indexetiquetar($Tipo)
    {
        $ordenes = ['NInventario', 'Nombre', 'IdTipo', 'NombreOrdenador', 'Modelo', 'FechaAlta', 'FechaBaja', 'PrecioAdquisicion'];
        $orden = request()->query('orden') ?: 'NombreOrdenador';
        abort_unless(in_array($orden, $ordenes), 404);

        //Unir las tablas tipoequipos y tipos para tener todos los tipos
        $tipos = DB::table('tipos')
        ->select("Denominación as Denominacion");

        $tipos1 = DB::table('tipoequipos')
        ->select("Denominacion")
        ->union($tipos)
        ->get();

        //union de terminales, impresoras y equipos
        if ($Tipo == 'Simple') {
            if (request('dir') == 'desc') {
                $objeto1 = DB::table("terminales")
                ->select("usuarios.Nombre", "terminales.Id", "Imei as NombreOrdenador", "terminales.NInventario", "tipos.Denominación", "terminales.Etiquetar")
                ->leftJoin('relacionterminales', 'terminales.id', '=', 'relacionterminales.IdTerminal')
                ->leftJoin('usuarios', 'relacionterminales.IdUsuario', '=', 'usuarios.id')
                ->leftJoin('tipos', 'terminales.IdTipo', '=', 'tipos.id')
                ->whereNull('terminales.FechaBaja')
                ->whereNull('relacionterminales.FechaBaja')
                ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                ->where('Imei', 'LIKE', '%'.request('NombreOrdenador').'%')
                ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                ->where('Denominación', 'LIKE', '%'.request('IdTipo').'%')
                ->where('Etiquetado', 0);

                $objeto2 = DB::table("i_impresoras")
                ->select("usuarios.Nombre", "i_impresoras.Id", "NumSerie as NombreOrdenador", "i_impresoras.NInventario", "tipos.Denominación", "i_impresoras.Etiquetar")
                ->leftJoin('usuarios', 'i_impresoras.IdUsuario', '=', 'usuarios.id')
                ->leftJoin('tipos', 'i_impresoras.IdTipo', '=', 'tipos.id')
                ->whereNull('i_impresoras.FechaBaja')
                ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                ->where('NumSerie', 'LIKE', '%'.request('NombreOrdenador').'%')
                ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                ->where('Denominación', 'LIKE', '%'.request('IdTipo').'%')
                ->where('Etiquetado', 0);
        
                $objeto = DB::table("equipos")
                ->select("usuarios.Nombre","equipos.Id", "equipos.NombreOrdenador","equipos.NInventario", "tipoequipos.Denominacion", "equipos.Etiquetar")
                ->leftJoin('relacionequipos', 'equipos.id', '=', 'relacionequipos.IdEquipo')
                ->leftJoin('tipoequipos', 'equipos.IdTipo', '=', 'tipoequipos.id')
                ->leftJoin('usuarios', 'relacionequipos.IdUsuario', '=', 'usuarios.id')
                ->whereNull('relacionequipos.FechaBaja')
                ->whereNull('equipos.FechaBaja')
                ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                ->where('NombreOrdenador', 'LIKE', '%'.request('NombreOrdenador').'%')
                ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                ->where('Denominacion', 'LIKE', '%'.request('IdTipo').'%')
                ->where('Etiquetado', 0)
                ->union($objeto1)
                ->union($objeto2)
                ->OrderByDesc($orden)
                ->get();

            } else {
                $objeto1 = DB::table("terminales")
                ->select("usuarios.Nombre", "terminales.Id", "Imei as NombreOrdenador", "terminales.NInventario", "tipos.Denominación", "terminales.Etiquetar")
                ->leftJoin('relacionterminales', 'terminales.id', '=', 'relacionterminales.IdTerminal')
                ->leftJoin('usuarios', 'relacionterminales.IdUsuario', '=', 'usuarios.id')
                ->leftJoin('tipos', 'terminales.IdTipo', '=', 'tipos.id')
                ->whereNull('terminales.FechaBaja')
                ->whereNull('relacionterminales.FechaBaja')
                ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                ->where('Imei', 'LIKE', '%'.request('NombreOrdenador').'%')
                ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                ->where('Denominación', 'LIKE', '%'.request('IdTipo').'%')
                ->where('Etiquetado', 0)
                ->OrderBy($orden);

                $objeto2 = DB::table("i_impresoras")
                ->select("usuarios.Nombre", "i_impresoras.Id", "NumSerie as NombreOrdenador", "i_impresoras.NInventario", "tipos.Denominación", "i_impresoras.Etiquetar")
                ->leftJoin('usuarios', 'i_impresoras.IdUsuario', '=', 'usuarios.id')
                ->leftJoin('tipos', 'i_impresoras.IdTipo', '=', 'tipos.id')
                ->whereNull('i_impresoras.FechaBaja')
                ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                ->where('NumSerie', 'LIKE', '%'.request('NombreOrdenador').'%')
                ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                ->where('Denominación', 'LIKE', '%'.request('IdTipo').'%')
                ->where('Etiquetado', 0)
                ->OrderBy($orden);
  
                $objeto = DB::table("equipos")
                ->select("usuarios.Nombre","equipos.Id", "equipos.NombreOrdenador","equipos.NInventario", "tipoequipos.Denominacion", "equipos.Etiquetar")
                ->leftJoin('relacionequipos', 'equipos.id', '=', 'relacionequipos.IdEquipo')
                ->leftJoin('tipoequipos', 'equipos.IdTipo', '=', 'tipoequipos.id')
                ->leftJoin('usuarios', 'relacionequipos.IdUsuario', '=', 'usuarios.id')
                ->whereNull('relacionequipos.FechaBaja')
                ->whereNull('equipos.FechaBaja')
                ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                ->where('NombreOrdenador', 'LIKE', '%'.request('NombreOrdenador').'%')
                ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                ->where('Denominacion', 'LIKE', '%'.request('IdTipo').'%')
                ->where('Etiquetado', 0)
                ->OrderBy($orden)
                ->union($objeto1)
                ->union($objeto2)
                ->get();

            }
        } else if ($Tipo == 'Todo') {
            if (request('dir') == 'desc') {
                $objeto1 = DB::table("terminales")
                ->select("usuarios.Nombre", "terminales.Id", "Imei as NombreOrdenador", "terminales.NInventario", "tipos.Denominación", "terminales.Etiquetar")
                ->leftJoin('relacionterminales', 'terminales.id', '=', 'relacionterminales.IdTerminal')
                ->leftJoin('usuarios', 'relacionterminales.IdUsuario', '=', 'usuarios.id')
                ->leftJoin('tipos', 'terminales.IdTipo', '=', 'tipos.id')
                ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                ->where('Imei', 'LIKE', '%'.request('NombreOrdenador').'%')
                ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                ->where('Denominación', 'LIKE', '%'.request('IdTipo').'%');

                $objeto2 = DB::table("i_impresoras")
                ->select("usuarios.Nombre", "i_impresoras.Id", "NumSerie as NombreOrdenador", "i_impresoras.NInventario", "tipos.Denominación", "i_impresoras.Etiquetar")
                ->leftJoin('usuarios', 'i_impresoras.IdUsuario', '=', 'usuarios.id')
                ->leftJoin('tipos', 'i_impresoras.IdTipo', '=', 'tipos.id')
                ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                ->where('NumSerie', 'LIKE', '%'.request('NombreOrdenador').'%')
                ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                ->where('Denominación', 'LIKE', '%'.request('IdTipo').'%');
        
                $objeto = DB::table("equipos")
                ->select("usuarios.Nombre","equipos.Id", "equipos.NombreOrdenador","equipos.NInventario", "tipoequipos.Denominacion", "equipos.Etiquetar")
                ->leftJoin('relacionequipos', 'equipos.id', '=', 'relacionequipos.IdEquipo')
                ->leftJoin('tipoequipos', 'equipos.IdTipo', '=', 'tipoequipos.id')
                ->leftJoin('usuarios', 'relacionequipos.IdUsuario', '=', 'usuarios.id')
                ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                ->where('NombreOrdenador', 'LIKE', '%'.request('NombreOrdenador').'%')
                ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                ->where('Denominacion', 'LIKE', '%'.request('IdTipo').'%')
                ->union($objeto1)
                ->union($objeto2)
                ->OrderByDesc($orden)
                ->get();

            } else {
                $objeto1 = DB::table("terminales")
                ->select("usuarios.Nombre", "terminales.Id", "Imei as NombreOrdenador", "terminales.NInventario", "tipos.Denominación", "terminales.Etiquetar")
                ->leftJoin('relacionterminales', 'terminales.id', '=', 'relacionterminales.IdTerminal')
                ->leftJoin('usuarios', 'relacionterminales.IdUsuario', '=', 'usuarios.id')
                ->leftJoin('tipos', 'terminales.IdTipo', '=', 'tipos.id')
                ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                ->where('Imei', 'LIKE', '%'.request('NombreOrdenador').'%')
                ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                ->where('Denominación', 'LIKE', '%'.request('IdTipo').'%')
                ->OrderBy($orden);

                $objeto2 = DB::table("i_impresoras")
                ->select("usuarios.Nombre", "i_impresoras.Id", "NumSerie as NombreOrdenador", "i_impresoras.NInventario", "tipos.Denominación", "i_impresoras.Etiquetar")
                ->leftJoin('usuarios', 'i_impresoras.IdUsuario', '=', 'usuarios.id')
                ->leftJoin('tipos', 'i_impresoras.IdTipo', '=', 'tipos.id')
                ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                ->where('NumSerie', 'LIKE', '%'.request('NombreOrdenador').'%')
                ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                ->where('Denominación', 'LIKE', '%'.request('IdTipo').'%')
                ->OrderBy($orden);
        
                $objeto = DB::table("equipos")
                ->select("usuarios.Nombre","equipos.Id", "equipos.NombreOrdenador","equipos.NInventario", "tipoequipos.Denominacion", "equipos.Etiquetar")
                ->leftJoin('relacionequipos', 'equipos.id', '=', 'relacionequipos.IdEquipo')
                ->leftJoin('tipoequipos', 'equipos.IdTipo', '=', 'tipoequipos.id')
                ->leftJoin('usuarios', 'relacionequipos.IdUsuario', '=', 'usuarios.id')
                ->where('Nombre', 'LIKE', '%'.request('Nombre').'%')
                ->where('NombreOrdenador', 'LIKE', '%'.request('NombreOrdenador').'%')
                ->where('NInventario', 'LIKE', '%'.request('NInventario').'%')
                ->where('Denominacion', 'LIKE', '%'.request('IdTipo').'%')
                ->OrderBy($orden)
                ->union($objeto1)
                ->union($objeto2)
                ->get();
            }
        }
     
        $total = sizeof($objeto);

        return view('equipos.indexetiquetar', [
            'objeto' =>  $objeto,
            'tipos' => $tipos1,
            'tipourl' => $Tipo,
            'total' => $total,
        ]);
    }

    public function show($id)
    {

        $equipo = Equipo::all()->firstWhere('Id', $id);
        $relacion = Relacionequipo::OrderByDesc('FechaAlta')->where('IdEquipo', $id)->get();
        $mantenimiento = Mantenimientoequipo::all()->where('IdEquipo', $id);
        $documentos = Documento::where('Tabla', $equipo->tipo->Denominacion)->where('IdRelacionado', $id)->get();
        $fotos = DB::select('select * from fotos');

        return view('equipos.show', [
            'equipo' => $equipo,
            'relacion' => $relacion,
            'mantenimiento' => $mantenimiento,
            'documentos' => $documentos,
            'fotos' => $fotos,
        ]);
    }  

    public function create()
    {
        $equipo = new Equipo();
        $tipos = Tipoequipo::all();
        
        return view('equipos.create', [
            'equipo' => $equipo,
            'tipos' => $tipos,
        ]);
    }

    public function store()
    {
        $validados = $this->validar();

        //Para crear NInventario
        $ultimo = Equipo::all()->sortByDesc('Id')->first();
        $ninventarioultimo = $ultimo->NInventario;
        $stringSeparado = explode('-', $ninventarioultimo);
        $ninventario = $stringSeparado[1] + 1;
        $numeroconpatron = str_pad($ninventario, 6, "0", STR_PAD_LEFT);
        $ninventariofinal = 'E-' . $numeroconpatron;

        $equipo = new Equipo();

        $equipo->NInventario = $ninventariofinal;
        $equipo->IdTipo = $validados['Tipo'];
        $equipo->Modelo = $validados['Modelo'];
        $equipo->NombreOrdenador = $validados['NombreOrdenador'];
        $equipo->NumSerie = $validados['NumSerie'];
        $equipo->FechaAlta = new DateTime($validados['FechaAlta']);
        if ($validados['FechaBaja']) {
            $equipo->FechaBaja = new DateTime($validados['FechaAlta']);
        }

        $equipo->Observaciones = $validados['Observaciones'];
        $equipo->PrecioAdquisicion = $validados['PrecioAdquisicion'];

        $equipo->save();

        DB::select('INSERT INTO relacionequipos (IdEquipo, IdUsuario, FechaAlta) VALUES ( ?, 0, ?)', [$equipo->id, $equipo->FechaAlta]);
        
        return redirect('/')->with('success', 'Equipo creado con éxito.');
    }


    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        $tipos = Tipoequipo::all()->sortby("Denominacion");
        
        return view('equipos.edit', [
            'equipo' => $equipo,
            'tipos' => $tipos,
        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $equipo = Equipo::findOrFail($id);
 
        $FechaAlta = new DateTime($validados['FechaAlta']);
        $FechaBaja = null;
        if ($validados['FechaBaja']) {
            $FechaBaja = new DateTime($validados['FechaAlta']);
        }

        DB::select('UPDATE equipos SET IdTipo = ?, Modelo = ?, NombreOrdenador = ?, NumSerie = ?, FechaAlta = ?, FechaBaja = ?, Observaciones = ?, PrecioAdquisicion = ?  
                                   WHERE id = ?', [$validados['Tipo'], $validados['Modelo'], $validados['NombreOrdenador'], $validados['NumSerie'], $FechaAlta, 
                                 $FechaBaja, $validados['Observaciones'], $validados['PrecioAdquisicion'], $id]);

        return redirect('/equipos/'.$equipo->Id)->with('success', 'Equipo actualizado.');
    }

    private function validar()
    {
        $validados = request()->validate([
            'Tipo' => 'exists:tipoequipos,Id',
            'NombreOrdenador' => 'required|max:255',
            'Modelo' => 'required|max:255',
            'NumSerie' => 'required|max:255',
            'FechaAlta' => 'required|date_format:Y-m-d',
            'FechaBaja' => 'nullable|date_format:Y-m-d',
            'Observaciones' => 'nullable|max:255',
            'PrecioAdquisicion' => 'required',
        ]);

        return $validados;
    }

    public function recabar()
    {
        $tipos = Tipoequipo::all();        

        $mantenimientos = ['No', 'Si'];

        return view('equipos.recabar', [
            'tipos' => $tipos,
            'mantenimientos' => $mantenimientos,
        ]);
    }

    public function generar(Request $request)
    {

        if($request->Hasta == null) {
            $request->Hasta = Carbon::now();
        } 
      
        if ($request->Tipo != 'Todos'){

            $altas = Equipo::select('*')
                ->where('FechaAlta', '<=', $request->Hasta)
                ->where('IdTipo', $request->Tipo)
                ->whereNull('FechaBaja')
                ->orWhere(function ($query) use ($request) {
                    $query->where('FechaAlta', '<', $request->Hasta )
                        ->where('FechaBaja', '>', $request->Hasta);
                })
                ->get();

            $altas2 = $altas->where('IdTipo', $request->Tipo)
                            ->where('FechaAlta', '<=', $request->Hasta);
            

            $bajas = Equipo::select('*')
                ->where('IdTipo', $request->Tipo)
                ->whereBetween('FechaBaja', [$request->Desde, $request->Hasta])
                ->get();

            $componente = DB::table('mantenimientoequipos')
                            ->join('equipos', 'mantenimientoequipos.IdEquipo', 'equipos.id')
                            ->select('mantenimientoequipos.*', 'equipos.IdTipo')
                            ->where('equipos.IdTipo', $request->Tipo)->get();
           
        } else {

            $altas = Equipo::select('*')
                ->where('FechaAlta', '<=', $request->Hasta)
                ->whereNull('FechaBaja')
                ->orWhere(function ($query) use ($request) {
                    $query->where('FechaAlta', '<', $request->Hasta )
                        ->where('FechaBaja', '>', $request->Hasta);
                })
                ->get();

            $bajas = Equipo::select('*')
                ->whereBetween('FechaBaja', [$request->Desde, $request->Hasta])
                ->get();

            $componente = DB::table('mantenimientoequipos')
                            ->join('equipos', 'mantenimientoequipos.IdEquipo', 'equipos.id')
                            ->select('mantenimientoequipos.*', 'equipos.IdTipo')->get();

        }

        $coalta = null;
        $cobaja = null;

        if ($request->mantenimiento == 'Si') {

            $coalta = Mantenimientoequipo::select('*')
            ->where('FechaAlta', '<=', $request->Hasta)
            ->whereNull('FechaBaja')
            ->orWhere(function ($query) use ($request) {
                $query->where('FechaAlta', '<', $request->Hasta )
                    ->where('FechaBaja', '>', $request->Hasta);
            })
            ->get();

            //Comprobar si la fecha de alta del mantenimiento es la misma que la del equipo para ver si es un mantenmiento inicial
            $arraycoalta = [];
            foreach ($coalta as $co) {
                if ($co->FechaAlta == $co->equipo->FechaAlta){
                    array_push($arraycoalta, $co->Id);
                }
            }

            $coalta = $coalta->whereNotIn('Id', $arraycoalta);
            
            //Para comprobar los mantenimientos de alta por tipos
            if ($request->Tipo != 'Todos' and $coalta->count() != 0) {
                $equipostipos = Equipo::where('IdTipo', $request->Tipo)->get();

                $array = [];
                foreach ($equipostipos as $equipotipo) {
                    array_push($array, $equipotipo->Id);
                }

                $coalta = $coalta->whereIn('IdEquipo', $array);
                   
            }

            $cobaja = Mantenimientoequipo::select('*')
                ->whereBetween('FechaBaja', [$request->Desde, $request->Hasta])
                ->get();

            //Para comprobar los mantenimientos de baja por tipos
            if ($request->Tipo != 'Todos' and $cobaja->count() != 0) {
                $equipostipos = Equipo::where('IdTipo', $request->Tipo)->get();

                $array = [];
                foreach ($equipostipos as $equipotipo) {
                    array_push($array, $equipotipo->Id);
                }

                $cobaja = $cobaja->whereIn('IdEquipo', $array);
                
            } 
        }
 
        $pdf = Pdf::loadView('equipos.generar', [
            'equipoAlta' => $altas,
            'equipoBaja' => $bajas,
            'componenteAlta' => $coalta,
            'componenteBaja' => $cobaja,
            'request' => $request,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream(); 
      
    }

    public function etiquetar($Tipo)
    {
        if (isset($_COOKIE['idaetiquetar'])) {
            $stringSeparado = explode('-', $_COOKIE['idaetiquetar']);

            if ($stringSeparado[0] == 'E') {
                DB::table('equipos')
                ->where('Id', $stringSeparado[1])
                ->update(['Etiquetar' => 1]);
            } else if (($stringSeparado[0] == 'T')) {
                DB::table('terminales')
                ->where('Id', $stringSeparado[1])
                ->update(['Etiquetar' => 1]);
            } else if (($stringSeparado[0] == 'I')) {
                DB::table('i_impresoras')
                ->where('Id', $stringSeparado[1])
                ->update(['Etiquetar' => 1]);
            }

        } else if (isset($_COOKIE['idaquitar'])) {

            $stringSeparado = explode('-', $_COOKIE['idaquitar']);

            if ($stringSeparado[0] == 'E') {
                DB::table('equipos')
                ->where('Id', $stringSeparado[1])
                ->update(['Etiquetar' => 0, 'Etiquetado' => 0]);
            } else if (($stringSeparado[0] == 'T')) {
                DB::table('terminales')
                ->where('Id', $stringSeparado[1])
                ->update(['Etiquetar' => 0, 'Etiquetado' => 0]);
            } else if (($stringSeparado[0] == 'I')) {
                DB::table('i_impresoras')
                ->where('Id', $stringSeparado[1])
                ->update(['Etiquetar' => 0, 'Etiquetado' => 0]);
            }        
        }

        return redirect(route('etiquetar', $Tipo));
   
    }

    public function generaretiqueta($tipo, $tipo2)
    {        
        $equiposaetiquetar = Equipo::where('Etiquetar', 1)->where('Etiquetado', 0)->get();
        $terminalesaetiquetar = Terminal::where('Etiquetar', 1)->where('Etiquetado', 0)->get();
        $impresorasaetiquetar = I_impresora::where('Etiquetar', 1)->where('Etiquetado', 0)->get();

        $terminales = DB::table("terminales")
        ->select("terminales.Id", "terminales.FechaAlta","terminales.NInventario")
        ->where('Etiquetar', 1)
        ->where('Etiquetado', 0);

        $impresoras = DB::table("i_impresoras")
        ->select("i_impresoras.Id", "i_impresoras.FechaAlta","i_impresoras.NInventario")
        ->where('Etiquetar', 1)
        ->where('Etiquetado', 0);

        $equipos = DB::table("equipos")
        ->select("equipos.Id", "equipos.FechaAlta","equipos.NInventario")
        ->where('Etiquetar', 1)
        ->where('Etiquetado', 0)
        ->union($terminales)
        ->union($impresoras)
        ->get();

        foreach ($equiposaetiquetar as $equipo) {
            DB::table('equipos')
            ->where('Id', $equipo->Id)
            ->update(['Etiquetado' => 1]);
        }

        foreach ($impresorasaetiquetar as $impresora) {
            DB::table('i_impresoras')
            ->where('Id', $impresora->Id)
            ->update(['Etiquetado' => 1]);
        }

        foreach ($terminalesaetiquetar as $terminal) {
            DB::table('terminales')
            ->where('Id', $terminal->Id)
            ->update(['Etiquetado' => 1]);
        } 

        //Elegir si imprimir con la etiquetadora o con la impresora
        if ($tipo2 == 'Etiquetadora') {
            return view('equipos.etiqueta', [
                'equipos' => $equipos,
                'tipo' => $tipo,
            ]); 
        } elseif ($tipo2 == 'Impresora') {
            return view('equipos.etiquetasantiguas', [
                'equipos' => $equipos,
                'tipo' => $tipo,
            ]); 
        }
    
    }

    public function quitaretiquetar($Tipo)
    {
        $equipos = Equipo::where('Etiquetar', 1)->get();

        foreach ($equipos as $equipo) {
            DB::table('equipos')
            ->where('Id', $equipo->Id)
            ->update(['Etiquetar' => 0, 'Etiquetado' => 0]);
        }

        return redirect(route('etiquetar', $Tipo));
    }


}
