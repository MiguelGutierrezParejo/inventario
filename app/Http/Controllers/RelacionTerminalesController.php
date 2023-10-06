<?php

namespace App\Http\Controllers;

use App\Models\RelacionTerminal;
use App\Models\Terminal;
use App\Models\Usuario;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelacionTerminalesController extends Controller
{
    public function create($id)
    {
        $terminal = Terminal::findOrFail($id);
        $relacion = new RelacionTerminal();
        $empleados = Usuario::all();

        return view('relacionterminales.create', [
            'relacion' => $relacion,
            'terminal' => $terminal,
            'empleados' => $empleados,
        ]);
    }

    public function store($id)
    {
        $equipo = Terminal::findOrFail($id);
        $validados = $this->validar();
        $relacion = new RelacionTerminal();
        $relaciones = RelacionTerminal::all()->where('IdTerminal', $id);

        $relacion->IdTerminal = $equipo->Id;
        $relacion->IdUsuario = $validados['Usuario'];
        $relacion->FechaAlta = new DateTime($validados['FechaAlta']);
        $relacion->Observaciones = $validados['Observaciones'];

        $relacion->save();
        
        $contador = $relaciones->count();

        $FechaBajaAnterior =  $relacion->FechaAlta;
        if ($contador == 1) { 
            DB::select('UPDATE relacionterminales SET FechaBaja = ? WHERE id = ?', [$FechaBajaAnterior, $relaciones->first()->Id]);
        }

        if ($contador > 1) { 
            DB::select('UPDATE relacionterminales SET FechaBaja = ? WHERE id = ?', [$FechaBajaAnterior, $relaciones->last()->Id]);
        }

        if ($validados['Usuario'] != 0) {
            DB::select('DELETE FROM relacionterminales WHERE IdTerminal = ? AND IdUsuario = ?', [$equipo->Id, 0]);
        }

        return redirect('terminales/' . $relacion->IdTerminal)->with('success', 'Parámetros asignado con éxito.');
    }

    public function edit($id)
    {
        $relacion = RelacionTerminal::findOrFail($id);
        $empleados = Usuario::all();
        $terminal = Terminal::where('Id', $relacion->IdTerminal)->first();

        return view('relacionterminales.edit', [
            'relacion' => $relacion,
            'empleados' => $empleados,
            'terminal' => $terminal,
        ]);
    }

    public function update($id)
    {

        $validados = $this->validar();
        $relacion = RelacionTerminal::findOrFail($id);
        $relaciones = RelacionTerminal::where('IdTerminal', $relacion->IdTerminal)->whereNull('FechaBaja')->first();

        $Usuario = $validados['Usuario'];
        $FechaAlta = new DateTime($validados['FechaAlta']);
        $FechaBaja = null;

        if ($validados['FechaBaja']) {
            $FechaBaja = new DateTime($validados['FechaBaja']);
        } else {
            //Al editar y quitar la fecha de baja da de baja el anterior
            DB::table('relacionterminales')
            ->where('Id', $relaciones->Id)
            ->update(['FechaBaja' => Carbon::now()]);

            DB::select('DELETE FROM relacionterminales WHERE IdTerminal = ? AND IdUsuario = ?', [$relacion->IdTerminal, 0]);
        }
        
        $Observaciones = $validados['Observaciones'];

        DB::select('UPDATE relacionterminales SET IdUsuario = ?, FechaAlta = ?,
                                               FechaBaja = ?, Observaciones = ?
                                               WHERE id = ?', [$Usuario, $FechaAlta, $FechaBaja,$Observaciones, $id]);

        if ($FechaBaja and $relacion->FechaBaja == null){
            DB::select('INSERT INTO relacionterminales (IdTerminal, IdUsuario, FechaAlta) VALUES ( ?, 0, ?)', [$relacion->IdTerminal, $FechaBaja]);
        }
    
        return redirect('terminales/' . $relacion->IdTerminal)->with('success', 'Asignación actualizada con éxito.');;
    }


    public function destroy($id)
    {
        $relacion = RelacionTerminal::findOrFail($id);
        
        $relacion->delete();
        
        DB::select('DELETE FROM relacionterminales WHERE id = ?', [$relacion->Id]);

        return redirect()->back()->with('success', 'Instancia borrada correctamente');
    }


    private function validar()
    {
        //Establecer cookie para el usuario pasado
        setcookie("Nombreusuario", request('Usuario'), time() + 1);

        $validados = request()->validate([
            'Terminal' => 'exists:terminales,Id',
            'Usuario' => 'exists:usuarios,Id',
            'Observaciones' => 'nullable|max:255',
            'FechaAlta' => 'required',
            'FechaBaja' => 'nullable',
        ]);

        return $validados;
    }
}
