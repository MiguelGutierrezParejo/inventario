<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Mantenimientoequipo;
use App\Models\Relacionequipo;
use App\Models\Usuario;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RelacionequiposController extends Controller
{

    public function index($id){

        $equipo = Equipo::all()->firstWhere('Id', $id);

        $relacion = Relacionequipo::OrderByDesc('FechaAlta')->where('IdEquipo', $id)->get();

        $mantenimiento = Mantenimientoequipo::all()->where('IdEquipo', $id);

        return view('relacionequipos.index', [
            'equipo' => $equipo,
            'relacion' => $relacion,
            'mantenimiento' => $mantenimiento,
        ]);
    }

    public function create($id)
    {
        $equipo = Equipo::findOrFail($id);
        $relacion = new Relacionequipo();

        $empleados = Usuario::all();

        return view('relacionequipos.create', [
            'relacion' => $relacion,
            'equipo' => $equipo,
            'empleados' => $empleados
        ]);
    }

    public function store($id)
    {
        $equipo = Equipo::findOrFail($id);
        $validados = $this->validar();
        $relacion = new Relacionequipo();
        $relaciones = Relacionequipo::all()->where('IdEquipo', $id);

        $relacion->IdEquipo = $equipo->Id;
        $relacion->IdUsuario = $validados['Usuario'];
        $relacion->FechaAlta = new DateTime($validados['FechaAlta']);
        $relacion->Observaciones = $validados['Observaciones'];

        $relacion->save();

        $contador = $relaciones->count();

        $FechaBajaAnterior =  $relacion->FechaAlta;
        if ($contador == 1) {
            DB::select('UPDATE relacionequipos SET FechaBaja = ? WHERE id = ?', [$FechaBajaAnterior, $relaciones->first()->Id]);
        }

        if ($contador > 1) {
            DB::select('UPDATE relacionequipos SET FechaBaja = ? WHERE id = ?', [$FechaBajaAnterior, $relaciones->last()->Id]);
        }

        if ($validados['Usuario'] != 0) {
            DB::select('DELETE FROM relacionequipos WHERE IdEquipo = ? AND IdUsuario = ?', [$equipo->Id, 0]);
        }

        return redirect('equipos/' . $relacion->IdEquipo)
            ->with('success', 'Empleado asignado con éxito.');
    }

    public function edit($id)
    {
        $relacion = Relacionequipo::findOrFail($id);
        $empleados = Usuario::all();

        return view('relacionequipos.edit', [
            'relacion' => $relacion,
            'empleados' => $empleados,
        ]);
    }


    public function update($id)
    {
        $validados = $this->validar();

        $relacion = Relacionequipo::findOrFail($id);

        $relaciones = Relacionequipo::where('IdEquipo', $relacion->IdEquipo)->whereNull('FechaBaja')->first();

        $Usuario = $validados['Usuario'];
        $FechaAlta = new DateTime($validados['FechaAlta']);
        $FechaBaja = null;

        if ($validados['FechaBaja']) {
            $FechaBaja = new DateTime($validados['FechaBaja']);
        } else {

            //Al editar y quitar la fecha de baja da de baja el anterior
            DB::table('relacionequipos')
            ->where('Id', $relaciones->Id)
            ->update(['FechaBaja' => Carbon::now()]);

            DB::select('DELETE FROM relacionequipos WHERE IdEquipo = ? AND IdUsuario = ?', [$relacion->IdEquipo, 0]);
        }

        $Observaciones = $validados['Observaciones'];

        DB::select('UPDATE relacionequipos SET IdUsuario = ?, FechaAlta = ?,
                                               FechaBaja = ?, Observaciones = ?
                                               WHERE id = ?', [$Usuario, $FechaAlta, $FechaBaja,$Observaciones, $id]);

        if ($FechaBaja and $relacion->FechaBaja == null){
            DB::select('INSERT INTO relacionequipos (IdEquipo, IdUsuario, FechaAlta) VALUES ( ?, 0, ?)', [$relacion->IdEquipo, $FechaBaja]);
        }

        return redirect('equipos/' . $relacion->IdEquipo)->with('success', 'Empleado actualizado con éxito.');
    }
/*
    public function baja($id)
    {
        $relacion = Relacionequipo::findOrFail($id);

        $Usuario = $relacion->IdUsuario;
        $FechaAlta = new DateTime($relacion->FechaAlta);

        if ($relacion->FechaBaja != "") {
            $FechaBaja = new DateTime($relacion->FechaBaja);
        } else {
            $FechaBaja = Carbon::now();
        }

        $Observaciones = $relacion->Observaciones;

        DB::select('UPDATE relacionequipos SET IdUsuario = ?, FechaAlta = ?,
                                               FechaBaja = ?, Observaciones = ?
                                               WHERE id = ?', [$Usuario, $FechaAlta, $FechaBaja,$Observaciones, $id]);

        if ($FechaBaja){
            DB::select('INSERT INTO relacionequipos (IdEquipo, IdUsuario, FechaAlta) VALUES ( ?, 0, ?)', [$relacion->IdEquipo, $FechaBaja]);
        }

        return redirect('equipos/' . $relacion->IdEquipo)->with('success', 'Empleado actualizado con éxito.');
    }

*/
    public function destroy($id)
    {
        $relacion = Relacionequipo::findOrFail($id);

        $relacion->delete();

        DB::select('DELETE FROM relacionequipos WHERE id = ?', [$relacion->Id]);

        return redirect()->back()
            ->with('success', 'Asginación borrada correctamente');
    }

    private function validar()
    {
        //Establecer cookie para el usuario pasado
        setcookie("Nombreusuario", request('Usuario'), time() + 1);

        $validados = request()->validate([
            'Usuario' => 'exists:usuarios,Id',
            'Observaciones' => 'nullable|max:255',
            'FechaAlta' => 'required',
            'FechaBaja' => 'nullable',
        ]);

        return $validados;
    }
}
