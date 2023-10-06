<?php

namespace App\Http\Controllers;

use App\Models\Linea;
use App\Models\RelacionLinea;
use App\Models\Usuario;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelacionLineasController extends Controller
{
    public function create($id)
    {
        $linea = Linea::findOrFail($id);
        $relacion = new RelacionLinea();
        $empleados = Usuario::all();

        return view('relacionlineas.create', [
            'relacion' => $relacion,
            'linea' => $linea,
            'empleados' => $empleados,
        ]);
    }

    public function store($id)
    {
        $equipo = Linea::findOrFail($id);
        $validados = $this->validar();
        $relacion = new RelacionLinea();
        $relaciones = RelacionLinea::all()->where('IdLinea', $id);

        $relacion->IdLinea = $equipo->Id;
        $relacion->IdUsuario = $validados['Usuario'];
        $relacion->FechaAlta = new DateTime($validados['FechaAlta']);
        $relacion->Observaciones = $validados['Observaciones'];

        $relacion->save();
        
        $contador = $relaciones->count();

        $FechaBajaAnterior =  $relacion->FechaAlta;
        if ($contador == 1) { 
            DB::select('UPDATE relacionlineas SET FechaBaja = ? WHERE id = ?', [$FechaBajaAnterior, $relaciones->first()->Id]);
        }

        if ($contador > 1) { 
            DB::select('UPDATE relacionlineas SET FechaBaja = ? WHERE id = ?', [$FechaBajaAnterior, $relaciones->last()->Id]);
        }

        if ($validados['Usuario'] != 0) {
            DB::select('DELETE FROM relacionlineas WHERE IdLinea = ? AND IdUsuario = ?', [$equipo->Id, 0]);
        }

        return redirect('lineas/' . $relacion->IdLinea)
            ->with('success', 'Parámetros asignado con éxito.');
    }

    public function edit($id)
    {
        $relacion = RelacionLinea::findOrFail($id);
        $empleados = Usuario::all();
        $linea = Linea::where('Id', $relacion->IdLinea)->first();

        return view('relacionlineas.edit', [
            'relacion' => $relacion,
            'empleados' => $empleados,
            'linea' => $linea,
        ]);
    }


    public function update($id)
    {
        $validados = $this->validar();
        
        $relacion = RelacionLinea::findOrFail($id);

        $relaciones = RelacionLinea::where('IdLinea', $relacion->IdLinea)->whereNull('FechaBaja')->first();

        $Usuario = $validados['Usuario'];
        $FechaAlta = new DateTime($validados['FechaAlta']);
        $FechaBaja = null;

        if ($validados['FechaBaja']) {
            $FechaBaja = new DateTime($validados['FechaBaja']);
        } else {
            //Al editar y quitar la fecha de baja da de baja el anterior    
            DB::table('relacionlineas')
            ->where('Id', $relaciones->Id)
            ->update(['FechaBaja' => Carbon::now()]);

            DB::select('DELETE FROM relacionlineas WHERE IdLinea = ? AND IdUsuario = ?', [$relacion->IdLinea, 0]);
        }
        
        $Observaciones = $validados['Observaciones'];

        DB::select('UPDATE relacionlineas SET IdUsuario = ?, FechaAlta = ?,
                                               FechaBaja = ?, Observaciones = ?
                                               WHERE id = ?', [$Usuario, $FechaAlta, $FechaBaja,$Observaciones, $id]);

        if ($FechaBaja and $relacion->FechaBaja == null){
            DB::select('INSERT INTO relacionlineas (IdLinea, IdUsuario, FechaAlta) VALUES ( ?, 0, ?)', [$relacion->IdLinea, $FechaBaja]);
        }
    
        return redirect('lineas/' . $relacion->IdLinea)->with('success', 'Asignación actualizada con éxito.');;
    }


    public function destroy($id)
    {
        $relacion = RelacionLinea::findOrFail($id);
        
        $relacion->delete();
        
        DB::select('DELETE FROM relacionlineas WHERE id = ?', [$relacion->Id]);

        return redirect()->back()
            ->with('success', 'Instancia borrada correctamente');
    }


    private function validar()
    {

        //Establecer cookie para el usuario pasado
        setcookie("Nombreusuario", request('Usuario'), time() + 1);

        $validados = request()->validate([
            'Linea' => 'exists:lineas,Id',
            'Usuario' => 'exists:usuarios,Id',
            'Observaciones' => 'nullable|max:255',
            'FechaAlta' => 'required',
            'FechaBaja' => 'nullable',
        ]);

        return $validados;
    }
}
