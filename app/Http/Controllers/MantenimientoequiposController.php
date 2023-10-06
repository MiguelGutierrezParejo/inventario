<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Mantenimientoequipo;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MantenimientoequiposController extends Controller
{
    public function create($id)
    {
        $equipo = Equipo::findOrFail($id);
        $mantenimiento = new Mantenimientoequipo();

        return view('mantenimientoequipos.create', [
            'mantenimiento' => $mantenimiento,
            'equipo' => $equipo,
        ]);
    }

    public function store($id)
    {
        $equipo = Equipo::findOrFail($id);
        $validados = $this->validar();
        $mantenimiento = new Mantenimientoequipo();

        $mantenimiento->IdEquipo = $equipo->Id;
        $mantenimiento->Nombre = $validados['Nombre'];
        $mantenimiento->Caracteristicas = $validados['Caracteristicas'];
        $mantenimiento->Fabricante = $validados['Fabricante'];
        $mantenimiento->NumSerie = $validados['NumSerie'];
        $mantenimiento->FechaAlta = new DateTime($validados['FechaAlta']);
        $mantenimiento->Observaciones = $validados['Observaciones'];

        $mantenimiento->save();
        
        return redirect('equipos/' . $mantenimiento->IdEquipo)->with('success', 'Elemento asignado con éxito.');
    }
    
    public function edit($id)
    {
        $mantenimiento = Mantenimientoequipo::findOrFail($id);

        $equipo = Equipo::find($mantenimiento->IdEquipo);

        return view('mantenimientoequipos.edit', [
            'mantenimiento' => $mantenimiento,
            'equipo' => $equipo,
        ]);
    }


    public function update($id)
    {

        $validados = $this->validar();

        $mantenimiento = Mantenimientoequipo::findOrFail($id);

        $Nombre = $validados['Nombre'];
        $Caracteristicas = $validados['Caracteristicas'];
        $Fabricante = $validados['Fabricante'];
        $NumSerie = $validados['NumSerie'];
        $FechaAlta = new DateTime($validados['FechaAlta']);
        $FechaBaja = null;

        if ($validados['FechaBaja']) {
            $FechaBaja = new DateTime($validados['FechaBaja']);
        }
        
        $Observaciones = $validados['Observaciones'];

        DB::select('UPDATE mantenimientoequipos SET Nombre = ?, Caracteristicas = ?, Fabricante = ?, NumSerie = ?,
                                                FechaAlta = ?, FechaBaja = ?, Observaciones = ?
                                               WHERE id = ?', [$Nombre, $Caracteristicas, $Fabricante, $NumSerie, $FechaAlta, $FechaBaja, $Observaciones, $id]);
    
        return redirect('equipos/' . $mantenimiento->IdEquipo)->with('success', 'Elemento actualizado con éxito.');;
    }

    public function baja($id)
    {
    
        $mantenimiento = Mantenimientoequipo::findOrFail($id);

        $Nombre = $mantenimiento->Nombre;
        $Caracteristicas = $mantenimiento->Caracteristicas;
        $Fabricante = $mantenimiento->Fabricante;
        $NumSerie = $mantenimiento->NumSerie;
        $FechaAlta = new DateTime($mantenimiento->FechaAlta);
        $FechaBaja = Carbon::now();
        $Observaciones = $mantenimiento->Observaciones;

        DB::select('UPDATE mantenimientoequipos SET Nombre = ?, Caracteristicas = ?, Fabricante = ?, NumSerie = ?,
                                                FechaAlta = ?, FechaBaja = ?, Observaciones = ?
                                               WHERE id = ?', [$Nombre, $Caracteristicas, $Fabricante, $NumSerie, $FechaAlta, $FechaBaja, $Observaciones, $id]);
    
        return redirect('equipos/' . $mantenimiento->IdEquipo)->with('success', 'Elemento dado de baja con éxito.');;
    }


    public function destroy($id)
    {
        $mantenimiento = Mantenimientoequipo::findOrFail($id);
        
        $mantenimiento->delete();
        
        DB::select('DELETE FROM mantenimientoequipos WHERE id = ?', [$mantenimiento->Id]);

        return redirect()->back()
            ->with('success', 'Elemento dado de baja correctamente');
    }

    private function validar()
    {
        $validados = request()->validate([
            'Nombre' => 'required|max:255',
            'Caracteristicas' => 'required|max:255',
            'Fabricante' => 'nullable|max:255',
            'NumSerie' => 'nullable|max:255',
            'Observaciones' => 'nullable|max:255',
            'FechaAlta' => 'required|date_format:Y-m-d',
            'FechaBaja' => 'nullable|date_format:Y-m-d',
        ]);

        return $validados;
    }
}
