<?php

namespace App\Http\Controllers;

use App\Models\S_relacionusuariossoftware;
use App\Models\S_software;
use App\Models\Usuario;
use DateTime;
use Illuminate\Support\Facades\DB;

class S_relacionusuariossoftwaresController extends Controller
{


    public function create($id)
    {
        $software = S_software::findOrFail($id);
        $relacionusuariossoftware = new S_relacionusuariossoftware();

        $empleados = Usuario::all();

        $relaciones = S_relacionusuariossoftware::where('IdSoftware', '=', $id)->get();

        //Comprobar los usuarios que tengan ya una relacion con dicho software
        $array = [];
        foreach ($relaciones as $relacion) {
            array_push($array, $relacion->IdUsuario);
        }

        $empleadossinestar = $empleados->whereNotIn('Id', $array);

        return view('s_relacionusuariossoftware.create', [
            'software' => $software,
            'relacionusuariossoftware' => $relacionusuariossoftware,
            'empleados' => $empleadossinestar,
        ]);
    }

    public function store($id, $Origen)
    {
        $validados = $this->validar();

        $relacion = new S_relacionusuariossoftware();
        $relacion->IdUsuario = $validados['Usuario'];
        $relacion->IdSoftware = $validados['IdSoftware'];
        $relacion->FechaAlta = now()->format('Y-m-d');
        $relacion->save();

        //Para el redirect
        $id = $validados['IdSoftware'];

        if ($Origen == 'user') {
            return redirect('usuarios/' . $validados['Usuario'])->with('success', 'Software asignado con éxito.');
        } else if ($Origen == 'soft') {
            return redirect('softwares/' . $id)->with('success', 'Software asignado con éxito.');
        }

    }

    public function edit($id)
    {
        $relacion = S_RelacionUsuariosSoftware::find($id);
        $empleados = Usuario::all();

        return view('s_relacionusuariossoftware.edit', [
            'relacion' => $relacion,
            'empleados' => $empleados,
        ]);
    }


    private function validar()
    {
        //Establecer cookie para el usuario pasado
        setcookie("Nombreusuario", request('Usuario'), time() + 1);

        $validados = request()->validate([
            'Usuario' => 'exists:usuarios,Id',
            'IdSoftware' => 'nullable',
            'FechaAlta' => 'nullable',
            'FechaBaja' => 'nullable',
            'Observaciones' => 'nullable|max:255',
        ]);

        return $validados;
    }

    public function destroy($id)
    {
        $relacion = S_relacionusuariossoftware::findOrFail($id);

        $relacion->delete();

        DB::select('DELETE FROM s_relacionusuariossoftwares WHERE Id = ?', [$relacion->Id]);

        return redirect()->back()
        ->with('success', 'Instancia borrada correctamente');
    }

    public function createdesdeuser($id)
    {

        $usuario = Usuario::findOrFail($id);
        $relacionusuariossoftware = new S_relacionusuariossoftware();

        $softwares = S_software::all()->where('FechaBaja', '=', null);

        $relaciones = S_relacionusuariossoftware::where('IdUsuario', '=', $id)->get();

        //Comprobar los software que tengan ya una relacion con dicho usuario
        $array = [];
        foreach ($relaciones as $relacion) {
            array_push($array, $relacion->IdSoftware);
        }

        $softwaresinestar = $softwares->whereNotIn('Id', $array)->sortBy('Nombre');

        return view('s_relacionusuariossoftware.createdesdeuser', [
            'usuario' => $usuario,
            'relacionusuariossoftware' => $relacionusuariossoftware,
            'softwares' => $softwaresinestar,
        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();

        $relacion = S_relacionusuariossoftware::findOrFail($id);

        $FechaAlta = new DateTime($validados['FechaAlta']);

        $FechaBaja = null;
        if ($validados['FechaBaja']) {
            $FechaBaja = new DateTime($validados['FechaBaja']);
        }

        $Observaciones = $validados['Observaciones'];

        DB::select('UPDATE s_relacionusuariossoftwares SET FechaAlta = ?,
                                               FechaBaja = ?, Observaciones = ?
                                               WHERE id = ?', [$FechaAlta, $FechaBaja, $Observaciones, $id]);

        return redirect('usuarios/' . $relacion->IdUsuario)->with('success', 'Empleado actualizado con éxito.');
    }
}
